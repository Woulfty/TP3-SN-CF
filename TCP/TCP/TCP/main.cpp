#include "Sondeur.h"
#include <QtWidgets/QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    Sondeur w;
    w.show();
    return a.exec();
}
