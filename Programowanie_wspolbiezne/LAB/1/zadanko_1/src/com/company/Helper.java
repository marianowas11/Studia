package com.company;

import javax.swing.text.html.ListView;
import java.util.*;
import java.util.function.Predicate;
import java.util.stream.Collectors;

public class Helper {

    public String crateFormatedMenu(List<Pizza> pizzas){
        return pizzas.stream().parallel()
                .map(
                    p->p.getName() + ": " +
                    p.getIngredients().stream()
                        .map(i->i.getName())
                        .collect(Collectors.joining(", ")) + " - " +
                    p.getIngredients().stream().mapToInt(i->i.getPrice()).sum())
                .collect(Collectors.joining("\n"));
    }

    public Pizza findCheapestThinVegatarian(List<Pizza> pizzas){
        return pizzas.parallelStream()
                .filter(p->p.getIngredients().stream()
                    .noneMatch(i->i.isMeat() && i.equals(Ingredient.THICK_CRUST)))
                .min((Pizza p1, Pizza p2) ->
                        p1.getIngredients()
                                .stream()
                                .mapToInt(Ingredient::getPrice)
                                .sum() -
                                p2.getIngredients()
                                        .stream()
                                        .mapToInt(Ingredient::getPrice).sum())
                .orElse(null);
    }

    public List<Pizza> withoutAllergen(List<Pizza> pizzas, List<Ingredient> allergens){
        return pizzas.stream().filter(p->p.getIngredients().stream()
                .map(i->i.getName())
                .noneMatch(allergens.stream()
                        .map(a->a.getName())
                        .collect(Collectors.toSet())
                        ::contains)).collect(Collectors.toList());
    }

    public Map<String, Set<Ingredient>> groupByIngredients(List<Pizza> pizzas){
        return pizzas.stream()
                .flatMap(p ->p.getIngredients().stream()
                .distinct())
                .collect(Collectors.groupingBy(
                        i->i.isSpicy() && i.isMeat() ? "SPICY_MEAT"
                                : i.isMeat() ? "MEAT"
                                : i.isSpicy() ? "SPICY"
                                : "OTHER", Collectors.toSet()));

    }
}
