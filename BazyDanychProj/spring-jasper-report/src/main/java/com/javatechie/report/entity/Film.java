package com.javatechie.report.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;
import java.math.BigDecimal;

@AllArgsConstructor
@NoArgsConstructor
@ToString
@Data
@Entity
@Table(name = "filmy")
public class Film {
    @Id
    private int id_filmu;
    private String nazwa_filmu;
    private String rezyser;
    private String scenariusz;
    private String gatunek;
    private String produkcja;
    private String glos;
    private String napisy;
}
