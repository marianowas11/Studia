package com.javatechie.report.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@AllArgsConstructor
@NoArgsConstructor
@ToString
@Data
@Entity
@Table(name = "klienci")
public class Employee {
    @Id
    private int id_klienta;
    private String imie;
    private String nazwisko;
    private int nr_telefonu;
    private int ilosc_seansow;
}
