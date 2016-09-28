/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.factelec.ws;

import com.factelec.ws.ArchivoUtil;
import ec.gob.sri.comprobantes.ws.RecepcionComprobantes;
import ec.gob.sri.comprobantes.ws.RecepcionComprobantesService;
import ec.gob.sri.comprobantes.ws.RespuestaSolicitud;
import java.io.File;
import java.net.MalformedURLException;
import java.net.URL;
import javax.xml.namespace.QName;

/**
 *
 * @author Rolando
 */
public class EnvioComprobantesWs {

    private static RecepcionComprobantesService service;

    public EnvioComprobantesWs(String wsdlLocation) throws MalformedURLException {
        URL url = new URL(wsdlLocation);
        QName qname = new QName("http://ec.gob.sri.ws.recepcion", "RecepcionComprobantesService");
        service = new RecepcionComprobantesService(url, qname);
    }

    public RespuestaSolicitud enviarComprobante(File xmlFile) throws Throwable {
        RespuestaSolicitud response = null;
        try {
            RecepcionComprobantes port = service.getRecepcionComprobantesPort();
            byte[] archivoBytes = ArchivoUtil.convertirArchivoAByteArray(xmlFile);
            if (archivoBytes != null) {
                response = port.validarComprobante(archivoBytes);
            } else {
                throw new Throwable("El archivo es nulo o vacío.");
            }
        } catch (Exception e) {
            throw e;
        }
        return response;
    }
}
