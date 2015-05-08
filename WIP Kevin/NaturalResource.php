<?php

/**
 * Class NaturalResource
 * Represent a resource present on the map, which can evolve (by example to regenerate).
 */
abstract class NaturalResource {
    /*
     * TODO Reflexion BAkfr
     *
     * Une ressource naturelle évolue d'un état à un autre.
     * Pour chaque état, son apparence peut changer (son image + sa description)
     *
     * Une ressource change d'état au bout d'un temps donné.
     *
     * Chaque ressource peut en plus posséder une liste d'action possible, dépendant de son état,
     * ainsi que des variables supplémentaires [extras{}]
     *
     *
     * Coté serveur:
     * - Chaque ressource devrait être mis à jour le plus rapidement possible.
     * - A chaque requete serveur, les ressources sont mis à jour si besoin.
     *   -> Une ressource en à besoin si il y a un joueur sur la map. Sinon c'est inutile.
     *   -> Gestion du cache possible.
     *
     * Coté client:
     * - De nouveaux éléments à afficher sur la map.
     *   - Prévoir un menu en fonction. -- voir le fonctionnement actuel.
     * - La ressource peut évoluer sous les yeux du joueur.
     *   -> Procédé à définir --- ajax aprés timeout ? prévisible par l'user :(
     */
}


/*
 * DOnc, maintenant, what ??
 *
 * - Trouver comment afficher un élément "séparé" sur la map.
 */