package com.company;

import java.util.*;
import static com.company.Ingredient.*;
import static com.company.Pizza.*;
import java.time.Duration;
import java.time.Instant;

public class Main {
    

    public static final List<Pizza> ALL = Arrays.asList(MARGHERITA, CAPRI, HAVAI,
            CARUSO, MAMA_MIA, SOPRANO, CALABRESE, VEGETARIANA, CAPRESE, PASCETORE,
            FOUR_CHEESE, TABASCO, AMORE, FARMER);

    public static void main(String[] args) {
        Instant t1,t2;
        Helper helper = new Helper();

        t1 = Instant.now();
        System.out.println("\nLadne MENU Parallel Stream");
        System.out.println(helper.crateFormatedMenu(ALL));
        t2 = Instant.now();
        Duration dt=Duration.between(t1,t2);
        System.out.println("Czas: " + dt.toMillis() + " milisec\n");
        t1 = Instant.now();
        System.out.println("\nLadne MENU Stream");
        System.out.println(helper.crateFormatedMenuStream(ALL));
        t2 = Instant.now();
        dt=Duration.between(t1,t2);
        System.out.println("Czas: " + dt.toMillis() + " milisec\n");

        
        System.out.println("\nNajtansza CIENKA VEGE pizza");
        System.out.println(helper.findCheapestThinVegatarian(ALL));

        System.out.println("\nPizza bez ALERGENOW");
        List<Ingredient> allergens = Arrays.asList(PINEAPPLE, BEAN, MOZARELLA, PEPERONI);
        System.out.println(helper.withoutAllergen(ALL, allergens));

        System.out.println("\nPosortowana na ostre z miesem, miesne, ostre i inne");
        System.out.println(helper.groupByIngredients(ALL));
    }
}
