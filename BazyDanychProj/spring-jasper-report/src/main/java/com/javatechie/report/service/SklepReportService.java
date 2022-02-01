package com.javatechie.report.service;

import com.javatechie.report.entity.Sklep;
import com.javatechie.report.repository.SklepRepository;
import net.sf.jasperreports.engine.*;
import net.sf.jasperreports.engine.data.JRBeanCollectionDataSource;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.util.ResourceUtils;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Service
public class SklepReportService {

    @Autowired
    private SklepRepository repository;


    public String exportReport() throws FileNotFoundException, JRException {
        String path = "..\\generowaneRaporty";
        List<Sklep> employees = repository.findAll();
        //load file and compile it
        File file = ResourceUtils.getFile("classpath:Gb2.jrxml");
        JasperReport jasperReport = JasperCompileManager.compileReport(file.getAbsolutePath());
        JRBeanCollectionDataSource dataSource = new JRBeanCollectionDataSource(employees);
        Map<String, Object> parameters = new HashMap<>();
        parameters.put("createdBy", "Mariusz J");
        JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, parameters, dataSource);
        //if (reportFormat.equalsIgnoreCase("html")) {
            JasperExportManager.exportReportToHtmlFile(jasperPrint, path + "\\Gb2_Sklep.html");
        //}
        //if (reportFormat.equalsIgnoreCase("pdf")) {
            JasperExportManager.exportReportToPdfFile(jasperPrint, path + "\\Gb2_Sklep.pdf");
        //}

        return "Wygenerowane w : " + path;
    }
}
