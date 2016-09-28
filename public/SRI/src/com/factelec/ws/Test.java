/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.factelec.ws;

import ec.gob.sri.comprobantes.ws.Comprobante;
import ec.gob.sri.comprobantes.ws.Mensaje;
import ec.gob.sri.comprobantes.ws.RespuestaSolicitud;
import java.io.File;
import java.io.FileNotFoundException;
import java.net.MalformedURLException;
import java.util.List;

/**
 *
 * @author Rolando
 */
public class Test {

    private static void testEnvio(String xmlfirmado, String Recepcion) throws MalformedURLException, Throwable {
        CertificadosSSL.instalarCertificados();
        //Con la URL del WSDL especificas si se debe conectar a los servicios de pruebas o producción
        EnvioComprobantesWs ec = new EnvioComprobantesWs(Recepcion);
//        RespuestaSolicitud response = ec.enviarComprobante(new File("D:\\lote_01.xml"));
        RespuestaSolicitud response = ec.enviarComprobante(new File(xmlfirmado));
        System.out.println(response.getEstado());
        List<Comprobante> lstComprobantes = response.getComprobantes().getComprobante();
        for (Comprobante comprobante : lstComprobantes) {
            List<Mensaje> lstMensajes = comprobante.getMensajes().getMensaje();
            for (Mensaje mensaje : lstMensajes) {
                System.out.println(mensaje.getIdentificador() + "\t" + mensaje.getTipo() + "\t" + mensaje.getMensaje() + "\t" + mensaje.getInformacionAdicional());
            }
        }
    }

    private static void testAutorizacion(String claveacceso,String OutAutorizados, String OutRechazados,String Autorizacion) throws MalformedURLException, FileNotFoundException, Exception {
        CertificadosSSL.instalarCertificados();
        AutorizacionComprobantesWs ec = new AutorizacionComprobantesWs(Autorizacion);
        ec.autorizarComprobante(claveacceso, OutAutorizados, OutRechazados);
    }

    private static void testAutorizacionLote() throws MalformedURLException, FileNotFoundException, Exception {
        CertificadosSSL.instalarCertificados();
        AutorizacionComprobantesWs ec = new AutorizacionComprobantesWs("https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl");
        ec.autorizarComprobanteLote("2709201601010511850900110010010000000518474274917", "c:\\archivos\\respuestassri\\aut.xml", "c:\\archivos\\respuestassri\\no_aut.xml");
    }

    public static void main(String[] args) throws MalformedURLException, FileNotFoundException, Exception, Throwable {
//        String xmlfirmado = "c:\\archivos\\firmados\\2709201601010511850900110010010000000539673889911.XML";
//        String claveAcceso = "2709201601010511850900110010010000000539673889911";
//        String OutAutorizados = "c:\\archivos\\autorizados\\"+claveAcceso+".xml";
//        String OutRechazados = "c:\\archivos\\rechazados\\"+claveAcceso+".xml";
//        String Recepcion = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl";
//        String Autorizacion = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";
        String xmlfirmado = args[0];
        String claveAcceso = args[1];
        String OutAutorizados = args[2];
        String OutRechazados = args[3];
        String Recepcion = args[4];
        String Autorizacion = args[5];
        testEnvio(xmlfirmado, Recepcion);
        testAutorizacion(claveAcceso,OutAutorizados,OutRechazados,Autorizacion);
//        testAutorizacionLote();
    }
}
