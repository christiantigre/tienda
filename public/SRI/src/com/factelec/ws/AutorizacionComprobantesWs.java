/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.factelec.ws;

import ec.gob.sri.comprobantes.ws.aut.Autorizacion;
import ec.gob.sri.comprobantes.ws.aut.AutorizacionComprobantes;
import ec.gob.sri.comprobantes.ws.aut.AutorizacionComprobantesService;
import ec.gob.sri.comprobantes.ws.aut.Mensaje;
import ec.gob.sri.comprobantes.ws.aut.RespuestaComprobante;
import ec.gob.sri.comprobantes.ws.aut.RespuestaLote;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.Writer;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.List;
import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBElement;
import javax.xml.bind.Marshaller;
import javax.xml.namespace.QName;

/**
 *
 * @author Rolando
 */
public class AutorizacionComprobantesWs {

    private AutorizacionComprobantesService service;

    public AutorizacionComprobantesWs(String wsdlLocation) throws MalformedURLException {
        URL url = new URL(wsdlLocation);
        QName qname = new QName("http://ec.gob.sri.ws.autorizacion", "AutorizacionComprobantesService");
        service = new AutorizacionComprobantesService(url, qname);
    }

    public void autorizarComprobanteLote(String claveDeAcceso, String nombreArchivo, String nombreArchivoNA) throws FileNotFoundException, Exception {
        try {
            RespuestaLote respuesta = null;
            AutorizacionComprobantes port = service.getAutorizacionComprobantesPort();
            respuesta = port.autorizacionComprobanteLote(claveDeAcceso);
            List<Autorizacion> listaAutorizaciones = respuesta.getAutorizaciones().getAutorizacion();
            if (listaAutorizaciones.isEmpty()) {
                System.out.println("Lista vacía 1");
            } else {
                for (Autorizacion autorizacion : listaAutorizaciones) {
                    String estado = autorizacion.getEstado();
                    if (estado.toUpperCase().compareTo("AUTORIZADO") == 0) {
                        //Guardar comprobante autorizado
                        autorizacion.setComprobante((new StringBuilder()).append("<![CDATA[").append(autorizacion.getComprobante()).append("]]>").toString());
                        JAXBContext jc = JAXBContext.newInstance(Autorizacion.class);
                        Marshaller marshaller = jc.createMarshaller();
                        marshaller.setProperty(Marshaller.JAXB_FORMATTED_OUTPUT, Boolean.TRUE);
                        marshaller.setProperty(Marshaller.JAXB_FRAGMENT, Boolean.TRUE);
                        Writer writer = new FileWriter(nombreArchivo);
                        writer.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
                        marshaller.marshal(new JAXBElement<Autorizacion>(new QName("autorizacion"), Autorizacion.class, autorizacion), writer);
                        writer.close();
                    } else {
                        List<Mensaje> mensajes = autorizacion.getMensajes().getMensaje();
                        if (mensajes.isEmpty()) {
                            System.out.println("Lista vacía de no autorizado.");
                        } else {
                            //Guardar comprobante no autorizado
                            autorizacion.setComprobante((new StringBuilder()).append("<![CDATA[").append(autorizacion.getComprobante()).append("]]>").toString());
                            JAXBContext jc = JAXBContext.newInstance(Autorizacion.class);
                            Marshaller marshaller = jc.createMarshaller();
                            marshaller.setProperty(Marshaller.JAXB_FORMATTED_OUTPUT, Boolean.TRUE);
                            marshaller.setProperty(Marshaller.JAXB_FRAGMENT, Boolean.TRUE);
                            Writer writer = new FileWriter(nombreArchivoNA);
                            writer.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
                            marshaller.marshal(new JAXBElement<Autorizacion>(new QName("autorizacion"), Autorizacion.class, autorizacion), writer);
                            writer.close();
                        }
                    }
                }
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    public void autorizarComprobante(String claveDeAcceso, String nombreArchivo, String nombreArchivoNA) throws FileNotFoundException, Exception {
        try {
            RespuestaComprobante respuesta = null;
            AutorizacionComprobantes port = service.getAutorizacionComprobantesPort();
            respuesta = port.autorizacionComprobante(claveDeAcceso);
            if (respuesta != null) {
                List<Autorizacion> listaAutorizaciones = respuesta.getAutorizaciones().getAutorizacion();
                if (listaAutorizaciones.isEmpty()) {
                    System.out.println("No autorizado, error interno.");
                } else {
                    for (Autorizacion autorizacion : listaAutorizaciones) {
                        String estado = autorizacion.getEstado();
                        if (estado.toUpperCase().compareTo("AUTORIZADO") == 0) {
                            autorizacion.setComprobante((new StringBuilder()).append("<![CDATA[").append(autorizacion.getComprobante()).append("]]>").toString());
                            //Formateo de la fecha
//                            XMLGregorianCalendar fechaAut = autorizacion.getFechaAutorizacion();
//                            String fechaAutorizacion = fechaAut.getDay() + "/" + fechaAut.getMonth() + "/" + fechaAut.getYear() + " " + fechaAut.getHour() + ":" + fechaAut.getMinute();
                            //--
                            JAXBContext jc = JAXBContext.newInstance(Autorizacion.class);
                            Marshaller marshaller = jc.createMarshaller();
                            marshaller.setProperty(Marshaller.JAXB_FORMATTED_OUTPUT, Boolean.TRUE);
                            marshaller.setProperty(Marshaller.JAXB_FRAGMENT, Boolean.TRUE);
                            Writer writer = new FileWriter(nombreArchivo);
                            writer.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
                            marshaller.marshal(new JAXBElement<Autorizacion>(new QName("autorizacion"), Autorizacion.class, autorizacion), writer);
                            writer.close();
                        } else {
                            //Guadar comprobante no autorizado
                            List<Mensaje> mensajes = autorizacion.getMensajes().getMensaje();
                            if (mensajes.isEmpty()) {
                                System.out.println("No autorizado, error interno.");
                            } else {
                                autorizacion.setComprobante((new StringBuilder()).append("<![CDATA[").append(autorizacion.getComprobante()).append("]]>").toString());
                                JAXBContext jc = JAXBContext.newInstance(Autorizacion.class);
                                Marshaller marshaller = jc.createMarshaller();
                                marshaller.setProperty(Marshaller.JAXB_FORMATTED_OUTPUT, Boolean.TRUE);
                                marshaller.setProperty(Marshaller.JAXB_FRAGMENT, Boolean.TRUE);
                                Writer writer = new FileWriter(nombreArchivo);
                                writer.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
                                marshaller.marshal(new JAXBElement<Autorizacion>(new QName("autorizacion"), Autorizacion.class, autorizacion), writer);
                                writer.close();
                            }
                        }
                    }
                }
            } else if (respuesta == null || respuesta.getAutorizaciones().getAutorizacion().isEmpty()) {
                System.out.println("La respuesta es nula.");
            }
        } catch (java.io.FileNotFoundException ex) {
            throw ex;
        } catch (Exception ex) {
            throw ex;
        }
    }
}
