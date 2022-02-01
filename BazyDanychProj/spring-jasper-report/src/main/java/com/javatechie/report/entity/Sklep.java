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
@Table(name = "sklep")
public class Sklep {
    @Id
    private int id_oferty;
    private String nazwa_oferty;
    private int id_produktu;
    private BigDecimal cena;
    private BigDecimal ilosc;
    private String jednostka;
}
