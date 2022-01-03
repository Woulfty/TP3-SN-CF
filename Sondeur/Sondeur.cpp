#include "Sondeur.h"
#include "Qdebug"
#include <QRegExp>
#include <qmessagebox.h>

//Include des dépendances pour les requêtes SQL
#include <QSqlDatabase>
#include <QtSql/QtSql>
#include <QSqlQuery>
#include <QtSql>

//Include pour le socket
//#include <QtCore/QCoreApplication>
//#include "serverTCP.h"
//#include "serverWebSocket.h"
//#include "bddserver.h"


#define PORT "COM1"

Sondeur::Sondeur(QWidget *parent)
	: QMainWindow(parent)
{
	ui.setupUi(this);

	port = new QSerialPort(this);
	QObject::connect(port, SIGNAL(readyRead()), this, SLOT(serialPortRead()));
	port->setPortName(PORT);
	port->open(QIODevice::ReadWrite);
	port->setBaudRate(QSerialPort::Baud4800);
	port->setDataBits(QSerialPort::DataBits::Data8);
	port->setParity(QSerialPort::Parity::NoParity);
	port->setStopBits(QSerialPort::StopBits::OneStop);
	port->setFlowControl(QSerialPort::NoFlowControl);

	// - Connecting to mysql database
	QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
	db.setHostName("192.168.65.201");
	db.setDatabaseName("SNCF");
	db.setUserName("admin");
	db.setPassword("admin");

	if (db.open()) {
		QMessageBox::information(this, "Connection", "Database connected successfully");
	}
	else {
		QMessageBox::information(this, "Not Connected", "Database is not connected");
		exit(1);
	}

	/*if (port->isOpen())
	{
		qDebug() << "Ping Pong";
	}
	else
	{
		qDebug() << "Ching Chong";
	}*/
}

/*int main(int argc, char *argv[])
{
	QCoreApplication a(argc, argv);

	//Connexion à la BDD
	bddserver *bdd = new bddserver();
	bdd->bddInit("QMYSQL", "192.168.65.201", "SNCF", "root", "root");

	//Appel du server WS
	QtserverWebSocket serverWebSocket(bdd, 1234);

	//Appel du server TCP
	QtserverTCP serverTcp(bdd, 4321);

	serverTcp.setWSServer(&serverWebSocket);
	serverWebSocket.setTcpServer(&serverTcp);

	return a.exec();
}*/


void Sondeur::serialPortRead() {

	QByteArray data = port->read(port->bytesAvailable());
	QString str(data);
	trameBuff += str;

	//qDebug() << trameBuff;

	QRegExp startMatch("GPGGA(.+)")
		, stopMatch("(\\*)");

	int startByte = startMatch.indexIn(trameBuff);


	if (startByte > -1 && startByte > 0 && stopMatch.indexIn(trameBuff, startByte + 1) > -1) {

		// qDebug() << trameBuff;
		QRegExp regex("GPGGA,(.+)(\\*)");
		int test = regex.indexIn(trameBuff);

		qDebug() << trameBuff;

		QStringList list = regex.capturedTexts();
		trameBuff.replace(0, stopMatch.indexIn(trameBuff, startByte + 1), "");

		// -- D�coupe notre chaine � chaque virgules
		QStringList data = list.at(1).split(',', Qt::SkipEmptyParts);

		QString Longitude = data.at(1)
			, Latitude = data.at(3)
			, Timestamp = data.at(0);
		// -- Conversion
		int LongitudeDot = Longitude.indexOf(".")
			, LatitudeDot = Latitude.indexOf(".");

		if (Longitude.toDouble() > 10) {
			Longitude.insert(LongitudeDot - 2, ",");
		}
		else {
			Longitude.insert(LongitudeDot - 1, "00,");
		}

		if (Latitude.toDouble() > 10) {
			Latitude.insert(LatitudeDot - 2, ",");
		}
		else {
			Longitude.insert(LongitudeDot - 1, "00,");
		}

		// -- Latitude
		QStringList LatitudeSplit = Latitude.split(",");
		double LatitudeDivide = LatitudeSplit.at(1).toDouble() / 60;
		double LatitudePDivide = LatitudeSplit.at(0).toDouble();
		double VraiLatitude = LatitudeDivide + LatitudePDivide;

		// -- Longitude

		QStringList LongitudeSplit = Longitude.split(",");
		double LongitudeDivide = LongitudeSplit.at(1).toDouble() / 60;
		double LongitudePDivide = LongitudeSplit.at(0).toDouble();
		double VraiLongitude = LongitudeDivide + LongitudePDivide;



		QString LongitudeString = QString::number(VraiLongitude);

		QString LatitudeString = QString::number(VraiLatitude);

		qDebug() << "Longitude : " << VraiLongitude;
		qDebug() << "Latitude : " << VraiLatitude;

		ui.latitude->setText(LatitudeString);
		ui.longitude->setText(LongitudeString);

		// -- Initialise la query 
		// updateTrain(LatitudeString, LongitudeString);
	}
	QStringList list;
}


void Sondeur::updateTrain(QString latitude, QString longitude)
{
	QSqlQuery request;
	//request.prepare("UPDATE train SET `latitude` = '" + latitude + "', `longitude` = '" + longitude + "' WHERE id = '1'");
	request.exec("UPDATE train SET `latitude` = '2', `longitude` = '42' WHERE id = '1'");

	if (request.exec()) {
		QMessageBox::information(this, "result query", "Data updated Successfully");
	}
	else {
		QMessageBox::information(this, "result query", "Data not updated");
	}
}

//$SDMTW,,,C*36		:: Temperature
//$SDDPT,,*57		:: Profondeur

//Coordonnée
//$GPGGA, 00 00 42, 4952.6634, N, 00218.1741, E, 0, 0, 50.00, -47, M, , , , *26\r\n