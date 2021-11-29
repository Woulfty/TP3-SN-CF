#include "Sondeur.h"
#include "Qdebug"
#include <QRegExp>
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

	if (port -> isOpen())
	{
		qDebug() << "Ping Pong";
	} else
	{
		qDebug() << "Ching Chong";
	}
}

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

		Longitude.insert(LongitudeDot - 2, ",");
		Latitude.insert(LatitudeDot - 2, ",");

		QStringList LatitudeSplit = Latitude.split(",");
		double LatitudeDivide = LatitudeSplit.at(1).toDouble() / 60;
		double LatitudePDivide = LatitudeSplit.at(0).toDouble();
		double VraiLatitude = LatitudeDivide + LatitudePDivide;

		QStringList LongitudeSplit = Longitude.split(",");
		double LongitudeDivide = LongitudeSplit.at(1).toDouble() / 60;
		double LongitudePDivide = LongitudeSplit.at(0).toDouble();
		double VraiLongitude = LongitudeDivide + LongitudePDivide;

		QString LongitudeString = QString::number(VraiLongitude);

		QString LatitudeString = QString::number(VraiLatitude);

		qDebug() << "Longitude : " << VraiLongitude;
		qDebug() << "Latitude : " << VraiLatitude;

		ui.Label->setText(LatitudeString);
		ui.label->setText(LongitudeString);

	}
	QStringList list;
}
	
	//$SDMTW,,,C*36		:: Temperature
	//$SDDPT,,*57		:: Profondeur

	//Coordonnée
	//$GPGGA, 00 00 42, 4952.6634, N, 00218.1741, E, 0, 0, 50.00, -47, M, , , , *26\r\n