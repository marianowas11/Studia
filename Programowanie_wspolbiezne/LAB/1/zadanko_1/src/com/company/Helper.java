package com.company;

import java.util.*;
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
    public String crateFormatedMenuStream(List<Pizza> pizzas){
            return pizzas.stream()
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

    public Pizza findCheapestThinVegatarianStream(List<Pizza> pizzas){
        return pizzas.stream()
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
        return pizzas.parallelStream().filter(p->p.getIngredients().stream()
                .map(i->i.getName())
                .noneMatch(allergens.stream()
                        .map(a->a.getName())
                        .collect(Collectors.toSet())
                        ::contains)).collect(Collectors.toList());
    }
    public List<Pizza> withoutAllergenStream(List<Pizza> pizzas, List<Ingredient> allergens){
        return pizzas.stream().filter(p->p.getIngredients().stream()
                .map(i->i.getName())
                .noneMatch(allergens.stream()
                        .map(a->a.getName())
                        .collect(Collectors.toSet())
                        ::contains)).collect(Collectors.toList());
    }

    public Map<String, Set<Ingredient>> groupByIngredients(List<Pizza> pizzas){
        return pizzas.parallelStream()
                .flatMap(p ->p.getIngredients().stream()
                .distinct())
                .collect(Collectors.groupingBy(
                        i->i.isSpicy() && i.isMeat() ? "\nSPICY_MEAT"
                                : i.isMeat() ? "\nMEAT"
                                : i.isSpicy() ? "\nSPICY"
                                : "\nOTHER", Collectors.toSet()));
    }
    public Map<String, Set<Ingredient>> groupByIngredientsStream(List<Pizza> pizzas){
        return pizzas.stream()
                .flatMap(p ->p.getIngredients().stream()
                .distinct())
                .collect(Collectors.groupingBy(
                        i->i.isSpicy() && i.isMeat() ? "\nSPICY_MEAT"
                                : i.isMeat() ? "\nMEAT"
                                : i.isSpicy() ? "\nSPICY"
                                : "\nOTHER", Collectors.toSet()));
    }
}
