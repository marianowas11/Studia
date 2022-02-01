package com.javatechie.report.service;

import com.javatechie.report.entity.Film;
import com.javatechie.report.repository.FilmRepository;
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
public class FilmReportService {

    @Autowired
    private FilmRepository repository;


    public String exportReport() throws FileNotFoundException, JRException {
        String path = "..\\generowaneRaporty";
        List<Film> employees = repository.findAll();
        //load file and compile it
        File file = ResourceUtils.getFile("classpath:Gb1.jrxml");
        JasperReport jasperReport = JasperCompileManager.compileReport(file.getAbsolutePath());
        JRBeanCollectionDataSource dataSource = new JRBeanCollectionDataSource(employees);
        Map<String, Object> parameters = new HashMap<>();
        parameters.put("createdBy", "Mariusz J");
        JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, parameters, dataSource);
        //if (reportFormat.equalsIgnoreCase("html")) {
            JasperExportManager.exportReportToHtmlFile(jasperPrint, path + "\\Gb1_Film.html");
        //}
        //if (reportFormat.equalsIgnoreCase("pdf")) {
            JasperExportManager.exportReportToPdfFile(jasperPrint, path + "\\Gb1_Film.pdf");
        //}

        return "Wygenerowane w : " + path;
    }
}
