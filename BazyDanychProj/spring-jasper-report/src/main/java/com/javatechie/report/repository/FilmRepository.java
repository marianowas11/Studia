package com.javatechie.report.repository;

import com.javatechie.report.entity.Film;
import org.springframework.data.jpa.repository.JpaRepository;

public interface FilmRepository extends JpaRepository<Film,Integer> {
}
