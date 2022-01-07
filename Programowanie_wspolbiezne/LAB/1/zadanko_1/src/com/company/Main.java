package com.company;

import java.util.*;
import static com.company.Ingredient.*;
import static com.company.Pizza.*;

public class Main {
    public static final List<Pizza> ALL = Arrays.asList(MARGHERITA, CAPRI, HAVAI, CARUSO, MAMA_MIA, SOPRANO, CALABRESE, VEGETARIANA, CAPRESE, PASCETORE, FOUR_CHEESE, TABASCO, AMORE, FARMER);

    public static void main(String[] args) {

        Helper helper = new Helper();
        System.out.println("\nLadne MENU");
        System.out.println(helper.crateFormatedMenu(ALL));
        System.out.println("\nNajtansza CIENKA VEGE pizza");
        System.out.println(helper.findCheapestThinVegatarian(ALL));

        System.out.println("\nPizza bez ALERGENOW");
        List<Ingredient> allergens = Arrays.asList(PINEAPPLE, BEAN, MOZARELLA, PEPERONI);
        System.out.println(helper.withoutAllergen(ALL, allergens));

        System.out.println("\nPosortowana na ostre z miesem, miesne, ostre i inne");
        System.out.println(helper.groupByIngredients(ALL));
    }
}
