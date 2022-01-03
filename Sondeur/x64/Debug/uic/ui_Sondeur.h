/********************************************************************************
** Form generated from reading UI file 'Sondeur.ui'
**
** Created by: Qt User Interface Compiler version 5.14.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_SONDEUR_H
#define UI_SONDEUR_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QLabel>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPlainTextEdit>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_SondeurClass
{
public:
    QWidget *centralWidget;
    QLabel *longitude;
    QLabel *latitude;
    QLabel *latitude_2;
    QLabel *longitude_2;
    QLabel *SQL;
    QPlainTextEdit *SQL2;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *SondeurClass)
    {
        if (SondeurClass->objectName().isEmpty())
            SondeurClass->setObjectName(QString::fromUtf8("SondeurClass"));
        SondeurClass->resize(615, 450);
        centralWidget = new QWidget(SondeurClass);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        longitude = new QLabel(centralWidget);
        longitude->setObjectName(QString::fromUtf8("longitude"));
        longitude->setGeometry(QRect(260, 20, 111, 31));
        latitude = new QLabel(centralWidget);
        latitude->setObjectName(QString::fromUtf8("latitude"));
        latitude->setGeometry(QRect(260, 50, 111, 31));
        latitude_2 = new QLabel(centralWidget);
        latitude_2->setObjectName(QString::fromUtf8("latitude_2"));
        latitude_2->setGeometry(QRect(140, 50, 111, 31));
        longitude_2 = new QLabel(centralWidget);
        longitude_2->setObjectName(QString::fromUtf8("longitude_2"));
        longitude_2->setGeometry(QRect(140, 20, 111, 31));
        SQL = new QLabel(centralWidget);
        SQL->setObjectName(QString::fromUtf8("SQL"));
        SQL->setGeometry(QRect(20, 160, 561, 21));
        SQL2 = new QPlainTextEdit(centralWidget);
        SQL2->setObjectName(QString::fromUtf8("SQL2"));
        SQL2->setGeometry(QRect(70, 200, 471, 51));
        SondeurClass->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(SondeurClass);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 615, 21));
        SondeurClass->setMenuBar(menuBar);
        mainToolBar = new QToolBar(SondeurClass);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        SondeurClass->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(SondeurClass);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        SondeurClass->setStatusBar(statusBar);

        retranslateUi(SondeurClass);

        QMetaObject::connectSlotsByName(SondeurClass);
    } // setupUi

    void retranslateUi(QMainWindow *SondeurClass)
    {
        SondeurClass->setWindowTitle(QCoreApplication::translate("SondeurClass", "Sondeur", nullptr));
        longitude->setText(QString());
        latitude->setText(QString());
        latitude_2->setText(QCoreApplication::translate("SondeurClass", "Latitude :", nullptr));
        longitude_2->setText(QCoreApplication::translate("SondeurClass", "Longitude :", nullptr));
        SQL->setText(QCoreApplication::translate("SondeurClass", "TextLabel", nullptr));
    } // retranslateUi

};

namespace Ui {
    class SondeurClass: public Ui_SondeurClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_SONDEUR_H
