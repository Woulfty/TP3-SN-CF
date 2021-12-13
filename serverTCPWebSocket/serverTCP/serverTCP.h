#define MYSERVER_H

#include <QObject>
#include <QTcpSocket>
#include <QTcpServer>
#include <QDebug>

class QtserverTCP : public QObject {
	Q_OBJECT
	public:
		QtserverTCP(QObject *parent = Q_NULLPTR);

	public slots:
		void SocketConnected();
		//void ServerConnected();

	private:
		QTcpSocket * socket;
		QTcpServer * server;

};
