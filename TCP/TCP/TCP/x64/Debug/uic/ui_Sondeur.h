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
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_SondeurClass
{
public:
    QWidget *centralWidget;
    QLabel *Label;
    QLabel *label;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *SondeurClass)
    {
        if (SondeurClass->objectName().isEmpty())
            SondeurClass->setObjectName(QString::fromUtf8("SondeurClass"));
        SondeurClass->resize(852, 665);
        centralWidget = new QWidget(SondeurClass);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        Label = new QLabel(centralWidget);
        Label->setObjectName(QString::fromUtf8("Label"));
        Label->setGeometry(QRect(70, 80, 191, 81));
        label = new QLabel(centralWidget);
        label->setObjectName(QString::fromUtf8("label"));
        label->setGeometry(QRect(70, 100, 171, 91));
        SondeurClass->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(SondeurClass);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 852, 21));
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
        Label->setText(QString());
        label->setText(QString());
    } // retranslateUi

};

namespace Ui {
    class SondeurClass: public Ui_SondeurClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_SONDEUR_H
