/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package firmaJava;

import firmaJava.XAdESBESSignature;

/**
 *
 * @author Pc-Christian
 */
public class DevelopedSignature {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
//        String xmlPath = "c:\\archivos\\0109201601010188767655413090010000000188945846817.xml";
//        String pathSignature = "c:\\archivos\\christian_andres_tigre_condo.p12";
//        String passSignature = "Christian0105";
//        String pathOut = "c:\\archivos\\";
//        String nameFileOut = "factura_sign.xml";

    String xmlPath = args[2];
    String pathSignature = args[0];
    String passSignature = args[1];
    String pathOut = args[3];
    String nameFileOut = args[4];
        System.out.println("Ruta del XML de entrada: " + xmlPath);
        System.out.println("Ruta Certificado: " + pathSignature);
        System.out.println("Clave del Certificado: " + passSignature);
        System.out.println("Ruta de salida del XML: " + pathOut);
        System.out.println("Nombre del archivo salido: " + nameFileOut);

        try {
            XAdESBESSignature.firmar(xmlPath, pathSignature, passSignature, pathOut, nameFileOut);
        } catch (Exception e) {
            System.out.println("Error: " + e);
        }
    }

}
