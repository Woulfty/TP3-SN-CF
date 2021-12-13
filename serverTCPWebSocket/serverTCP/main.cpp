#include <QtCore/QCoreApplication>
#include "serverTCP.h"
#include "serverWebSocket.h"

int main(int argc, char *argv[])
{
	QCoreApplication a(argc, argv);

		InspectionServer server(1234);

	QtserverTCP server(&a);
	return a.exec();
}
