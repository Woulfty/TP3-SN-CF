#include "serverTCP.h"

QtserverTCP::QtserverTCP(QObject *parent) : QObject(parent){

	server = new QTcpServer(this);
	QObject::connect(server, SIGNAL(newConnection()), this, SLOT(SocketConnected()));

	if (server->listen(QHostAddress::AnyIPv4, 1234)) {
		qDebug() << "Serveur Demarre";
	}
	else {
		qDebug() << "Erreur lors du démarrage du serveur";
	}
}

void QtserverTCP::SocketConnected() {
	QTcpSocket * socket = server->nextPendingConnection();
	socket->write("Hello world\r\n");
	socket->flush();
	socket->waitForBytesWritten(5000);
	socket->close();
}