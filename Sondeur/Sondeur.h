#include <QtWidgets/QMainWindow>
#include "ui_Sondeur.h"
#include <QtSql>

#include <qDebug>

#include <QSerialPort>
#include <QSerialPortInfo>

class Sondeur : public QMainWindow
{
	Q_OBJECT

public:
	Sondeur(QWidget *parent = Q_NULLPTR);
	void updateTrain(QString latitude, QString longitude);

private:
	Ui::SondeurClass ui;

	QSerialPort *port;
	QString trameBuff;
	QString trame;

	QSqlDatabase * db;
	QString Qhost = "192.168.65.201";
	QString QUserName = "root";
	QString QPassword = "root";
	QString QDatabaseName = "SNCF";

public slots:
	void serialPortRead();

	//void decodeTrame(QString trame);
};
