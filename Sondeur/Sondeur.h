#include <QtWidgets/QMainWindow>
#include "ui_Sondeur.h"

#include <qDebug>

#include <QSerialPort>
#include <QSerialPortInfo>

class Sondeur : public QMainWindow
{
	Q_OBJECT

public:
	Sondeur(QWidget *parent = Q_NULLPTR);

private:
	Ui::SondeurClass ui;

	QSerialPort *port;
	QString trameBuff;
	QString trame;

public slots:
	void serialPortRead();

	//void decodeTrame(QString trame);
};
