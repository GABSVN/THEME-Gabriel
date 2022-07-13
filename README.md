<!-- -------awesome badge-------------------------------------- -->

<div align="center">
  <br /><br />
  <a href="https://gabsvn.ch"><img src="https://awesome.re/badge-flat.svg" /></a>
  <br /><br /><br />
</div>
<!------------------------------------------------------- -->


<!-- BANNIERE Wordpress CPT Project -->
<!------------------------------------------------------- -->

<p align="center">
  <a href="https://www.gabsvn.ch/" target="_blank" rel="noreferrer"><img src="https://user-images.githubusercontent.com/99598124/178707439-7b9dfaa0-adbe-4eb8-a869-d3b108c14ce1.gif" alt="my banner"></a>
</p>

<!-- --------------------------------------------------- -->

<!-- -------Badges Wordpress et PHP license 7 - 8 -------------------------------------- -->

![](https://img.shields.io/badge/Cms-Wordpress-informational?style=flat&logo=Wordpress&color=336791)
![](https://img.shields.io/badge/Code-Php-informational?style=flat&logo=Php&color=336791)
<!------------------------------------------------------- -->


<h2 align="center">
Thème Gabriel
</h2> 

Le projet THÈME Gabriel est un thème polyvalent qui fournit des fonctionnalités aux types de publication personnalisées et aux taxonomies WordPress. Il permet aux développeurs de créer rapidement des types de publication et des taxonomies.

Ce thème fonctionne à la fois avec l'éditeur classique et l'éditeur de blocs.

<h2 align="center">
Installation
</h2> 

Si vous n'avez pas installé Docker et Docker Compose, suivez les étapes décrites dans le billet de blog lié ci-dessus.

Avec Docker installé et en cours d'exécution, dans Terminal :

```php
		git clone 
		cd docker-wordpress-theme-setup		
```

```php
		docker-compose up -d
```

```php
		http://localhost:../
```


Boum, maintenant nous avons:

* Un type de publication "Stories", avec des étiquettes correctement générées et des messages mis à jour, trois colonnes personnalisées dans la zone d'administration (dont deux peuvent être triées), des histoires ajoutées au flux RSS principal et toutes les histoires affichées sur l'archive de type de publication.
* Une taxonomie 'Genre' attachée au type de publication 'Stories', avec des étiquettes correctement générées et des messages de mise à jour des termes, et une colonne personnalisée dans la zone d'administration.

Les fonctions `register_extended_post_type()` et `register_extended_taxonomy()` fsont finalement des enveloppes pour les fonctions `register_post_type()` et `register_taxonomy()` dans le noyau de WordPress, de sorte que n'importe lequel des paramètres de ces fonctions peut être utilisé.

Bien entendu, vous pouvez faire beaucoup plus.

## Contribuez et testez! ##

Veuillez contribuer et tester.

## License: GPLv2 ou ultérieure ##

Ce programme est un logiciel libre ; vous pouvez le redistribuer et/ou le modifier selon les termes de la licence publique générale GNU telle que publiée par la Free Software Foundation ; soit la version 2 de la licence, soit (à votre choix) toute version ultérieure.

Ce programme est distribué dans l'espoir qu'il sera utile, mais SANS AUCUNE GARANTIE ; sans même la garantie implicite de QUALITÉ MARCHANDE ou d'ADÉQUATION À UN USAGE PARTICULIER. Voir la licence publique générale GNU pour plus de détails.



<p align="center">
  <a href="https://www.gabsvn.ch/" target="_blank" rel="noreferrer"><img src="https://user-images.githubusercontent.com/99598124/177351635-51da0f6b-bd80-461d-bb3c-513397d6137d.gif" alt="my banner"></a>
</p>



