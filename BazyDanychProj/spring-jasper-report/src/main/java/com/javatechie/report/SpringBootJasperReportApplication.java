package com.javatechie.report;

import com.javatechie.report.entity.Sklep;
import com.javatechie.report.repository.SklepRepository;
import com.javatechie.report.service.SklepReportService;
import com.javatechie.report.entity.Film;
import com.javatechie.report.repository.FilmRepository;
import com.javatechie.report.service.FilmReportService;
import net.sf.jasperreports.engine.JRException;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.io.FileNotFoundException;
import java.util.List;

@SpringBootApplication
@RestController
public class SpringBootJasperReportApplication {

    @Autowired
    private SklepRepository sklepRepo;
    @Autowired
    private SklepReportService sklepService;
    @Autowired
    private FilmRepository filmRepo;
    @Autowired
    private FilmReportService filmService;


    @GetMapping("/gb2")
    public List<Sklep> getSklep() {

        return sklepRepo.findAll();
    }

    @GetMapping("/raport/gb2")
    public String generateReportGb2() throws FileNotFoundException, JRException {
        return sklepService.exportReport();
    }

    @GetMapping("/gb1")
    public List<Film> getFilm() {

        return filmRepo.findAll();
    }

    @GetMapping("/raport/gb1")
    public String generateReportGb1() throws FileNotFoundException, JRException {
        return filmService.exportReport();
    }

    public static void main(String[] args) {
        SpringApplication.run(SpringBootJasperReportApplication.class, args);
    }

}
