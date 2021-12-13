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
#include <QtWidgets/QListWidget>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_SondeurClass
{
public:
    QWidget *centralWidget;
    QListWidget *log;
    QLabel *longitude;
    QLabel *latitude;
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
        log = new QListWidget(centralWidget);
        log->setObjectName(QString::fromUtf8("log"));
        log->setGeometry(QRect(340, 10, 256, 192));
        longitude = new QLabel(centralWidget);
        longitude->setObjectName(QString::fromUtf8("longitude"));
        longitude->setGeometry(QRect(20, 10, 101, 31));
        latitude = new QLabel(centralWidget);
        latitude->setObjectName(QString::fromUtf8("latitude"));
        latitude->setGeometry(QRect(20, 40, 101, 31));
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
    } // retranslateUi

};

namespace Ui {
    class SondeurClass: public Ui_SondeurClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_SONDEUR_H
