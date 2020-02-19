<? php
/ **
 * WP Bootstrap Navwalker
 *
* @package WP-Bootstrap-Navwalker
 *
 * @ plugin wordpress
 * Nom du plugin: WP Bootstrap Navwalker
 * URI du plugin: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: une classe de navigation WordPress nav personnalisée pour implémenter le style de navigation Bootstrap 4 dans un thème personnalisé à l'aide du gestionnaire de menus intégré WordPress.
 * Auteur: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * Version: 4.3.0
 * URI de l'auteur: https://github.com/wp-bootstrap
 * URI du plugin GitHub: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Branche GitHub: maître
 * Licence: GPL-3.0 +
 * URI de licence: http://www.gnu.org/licenses/gpl-3.0.txt
 * /
// Vérifiez si la classe existe.
if ( !  class_exists ( ' WP_Bootstrap_Navwalker ' )) {
	/ **
	 * Classe WP_Bootstrap_Navwalker.
	 *
	 * @extends Walker_Nav_Menu
	 * /
	classe  WP_Bootstrap_Navwalker  étend  Walker_Nav_Menu {
		/ **
		 * Démarre la liste avant l'ajout des éléments.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu :: start_lvl ()
		 *
		 * @param string $ output Utilisé pour ajouter du contenu supplémentaire (transmis par référence).
		 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
		 * @param stdClass $ args Un objet d'arguments wp_nav_menu ().
		 * /
		 fonction  publique start_lvl ( & $ output , $ depth  =  0 , $ args  =  array ()) {
			if ( isset ( $ args -> item_spacing ) &&  ' discard '  ===  $ args -> item_spacing ) {
				$ t  =  ' ' ;
				$ n  =  ' ' ;
			} else {
				$ t  =  " \ t " ;
				$ n  =  " \ n " ;
			}
			$  indent =  str_repeat ( $ t , $ depth );
			// Classe par défaut à ajouter au fichier.
			$ classes  =  tableau ( ' menu déroulant ' );
			/ **
			 * Filtre la ou les classes CSS appliquées à un élément de liste de menus.
			 *
			 * @since WP 4.8.0
			 *
			 * @param array $ classes Les classes CSS qui sont appliquées à l'élément de menu `<ul>`.
			 * @param stdClass $ args Un objet d'arguments `wp_nav_menu ()`.
			 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
			 * /
			$ class_names  =  join ( '  ' , apply_filters ( ' nav_menu_submenu_css_class ' , $ classes , $ args , $ depth ));
			$ class_names  =  $ class_names ? ' class = " '  . esc_attr ( $ class_names ) .  ' " ' : ' ' ;
			/ *
			 * Le conteneur `.dropdown-menu` doit avoir une étiquette
			 * attribut qui pointe vers son lien déclencheur.
			 *
			 * Former une chaîne pour l'attribut labelledby à partir de la dernière
			 * lien avec un identifiant qui a été ajouté à la sortie $.
			 * /
			$ labelledby  =  ' ' ;
			// Recherche tous les liens avec un id dans la sortie.
			preg_match_all ( '/ (<a. * ? id = \ " | \' ) (. * ?) \" | \ ' . * ?> / im' , $ output , $ matches );
			// Avec le pointeur à la fin du tableau, vérifiez si nous avons obtenu une correspondance d'ID.
			if ( end ( $ correspond à [ 2 ])) {
				// Construit une chaîne à utiliser comme aria-labelledby.
				$ labelledby  =  ' aria-labelledby = " '  . esc_attr ( end ( $ correspond à [ 2 ])) .  ' " ' ;
			}
			$ output  . =  " { $ n } { $ indent  } <ul $ class_names $ labelledby role = \" menu \ " > { $ n } " ;
		}
		/ **
		 * Démarre la sortie de l'élément.
		 *
		 * @since WP 3.0.0
		 * @since WP 4.4.0 Le filtre { @see 'nav_menu_item_args'} a été ajouté.
		 *
		 * @see Walker_Nav_Menu :: start_el ()
		 *
		 * @param string $ output Utilisé pour ajouter du contenu supplémentaire (transmis par référence).
		 * @param WP_Post $ item Objet de données d'élément de menu.
		 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
		 * @param stdClass $ args Un objet d'arguments wp_nav_menu ().
		 * @param int $ id ID d'article actuel.
		 * /
		 fonction  publique start_el ( & $ output , $ item , $ depth  =  0 , $ args  =  array (), $ id  =  0 ) {
			if ( isset ( $ args -> item_spacing ) &&  ' discard '  ===  $ args -> item_spacing ) {
				$ t  =  ' ' ;
				$ n  =  ' ' ;
			} else {
				$ t  =  " \ t " ;
				$ n  =  " \ n " ;
			}
			$ indent  = ( $ profondeur )? str_repeat ( $ t , $ depth ): ' ' ;
			$ classes  =  vide ( $ item -> classes )? array (): ( array ) $ item -> classes ;
			/ *
			 * Initialiser certaines variables de support pour stocker un article spécialement traité
			 * emballages et icônes.
			 * /
			$ linkmod_classes  =  array ();
			$ icon_classes     =  array ();
			/ *
			 * Obtenez un tableau $ classes mis à jour sans linkmod ou classes d'icônes.
			 *
			 * REMARQUE: les tableaux linkmod et icon class sont transmis par référence et
			 * sont peut-être modifiés avant d'être utilisés plus tard dans cette fonction.
			 * /
			$ classes  =  self :: distinct_linkmods_and_icons_from_classes ( $ classes , $ linkmod_classes , $ icon_classes , $ depth );
			// Rejoignez toutes les classes d'icônes extraites de $ classes dans une chaîne.
			$ icon_class_string  =  join ( '  ' , $ icon_classes );
			/ **
			 * Filtre les arguments pour un seul élément du menu nav.
			 *
			 * WP 4.4.0
			 *
			 * @param stdClass $ args Un objet d'arguments wp_nav_menu ().
			 * @param WP_Post $ item Objet de données d'élément de menu.
			 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
			 * /
			$ args  = apply_filters ( ' nav_menu_item_args ' , $ args , $ item , $ depth );
			// Ajoutez des classes .dropdown ou .active là où elles sont nécessaires.
			if ( isset ( $ args -> has_children ) &&  $ args -> has_children ) {
				$ classes [] =  ' liste déroulante ' ;
			}
			if ( in_array ( ' current-menu-item ' , $ classes , true ) ||  in_array ( ' current-menu-parent ' , $ classes , true )) {
				$ classes [] =  ' actif ' ;
			}
			// Ajoutez des classes par défaut supplémentaires à l'élément.
			$ classes [] =  ' élément de  menu- ' .  $ item -> ID ;
			$ classes [] =  ' nav-item ' ;
			// Autorise le filtrage des classes.
			$ classes  = apply_filters ( ' nav_menu_css_class ' , array_filter ( $ classes ), $ item , $ args , $ depth );
			// Former une chaîne de classes au format: class = "class_names".
			$ class_names  =  join ( '  ' , $ classes );
			$ class_names  =  $ class_names ? ' class = " '  . esc_attr ( $ class_names ) .  ' " ' : ' ' ;
			/ **
			 * Filtre l'ID appliqué à l'élément d'élément de liste d'un élément de menu.
			 *
			 * @since WP 3.0.1
			 * @since WP 4.1.0 Le paramètre `$ depth` a été ajouté.
			 *
			 * @param string $ menu_id L'ID qui est appliqué à l'élément `<li>` de l'élément de menu.
			 * @param WP_Post $ item L'élément de menu actuel.
			 * @param stdClass $ args Un objet d'arguments wp_nav_menu ().
			 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
			 * /
			$ id  = apply_filters ( ' nav_menu_item_id ' , ' menu-item- '  .  $ item -> ID , $ item , $ args , $ depth );
			$ id  =  $ id ? ' id = " '  . esc_attr ( $ id ) .  ' " ' : ' ' ;
			$ output  . =  $ indent  .  ' <li itemscope = "itemscope" itemtype = "https://www.schema.org/SiteNavigationElement" '  .  $ id  .  $ class_names  .  ' > ' ;
			// Initialise le tableau pour contenir les $ atts pour l'élément de lien.
			$ atts  =  array ();
			/ *
			 * Définissez le titre de l'élément dans le tableau $ atts - si le titre est vide,
			 * par défaut au titre de l'élément.
			 * /
			if ( vide ( $ item -> attr_title )) {
				$ atts [ ' title ' ] =  !  vide ( $ item -> title )? strip_tags ( $ item -> title ): ' ' ;
			} else {
				$ atts [ ' title ' ] =  $ item -> attr_title ;
			}
			$ atts [ ' target ' ] =  !  vide ( $ item -> target )? $ item -> target : ' ' ;
			$ atts [ ' rel ' ]     =  !  vide ( $ item -> xfn )? $ item -> xfn : ' ' ;
			// Si l'élément a des enfants, ajoutez des atts au <a>.
			if ( isset ( $ args -> has_children ) &&  $ args -> has_children  &&  0  ===  $ depth  &&  $ args -> depth  >  1 ) {
				$ atts [ ' href ' ]           =  ' # ' ;
				$ atts [ ' data-toggle ' ]    =  ' liste déroulante ' ;
				$ atts [ ' aria-haspopup ' ] =  ' true ' ;
				$ atts [ ' aria-extended ' ] =  ' false ' ;
				$ atts [ ' class ' ]          =  ' lien de navigation à bascule ' ;
				$ atts [ ' id ' ]             =  ' menu-item-dropdown- '  .  $ item -> ID ;
			} else {
				$ atts [ ' href ' ] =  !  vide ( $ item -> url )? $ item -> url : ' # ' ;
				// Pour les éléments dans les listes déroulantes, utilisez .dropdown-item au lieu de .nav-link.
				if ( $ depth  >  0 ) {
					$ atts [ ' class ' ] =  ' dropdown-item ' ;
				} else {
					$ atts [ ' class ' ] =  ' nav-link ' ;
				}
			}
			$ atts [ ' aria-current ' ] =  $ item -> current ? ' page ' : ' ' ;
			// Mettre à jour les atts de cet élément en fonction des classes de linkmod personnalisées.
			$ atts  =  self :: update_atts_for_linkmod_type ( $ atts , $ linkmod_classes );
			// Autorise le filtrage du tableau $ atts avant de l'utiliser.
			$  atts = apply_filters ( ' nav_menu_link_attributes ' , $ atts , $ item , $ args , $ depth );
			// Construit une chaîne html contenant tous les atts de l'élément.
			$ attributes  =  ' ' ;
			foreach ( $ atts  as  $ attr  =>  $ value ) {
				si ( !  vide ( $ valeur )) {
					$ value        = ( ' href '  ===  $ attr )? esc_url ( $ value ): esc_attr ( $ value );
					$ attributs  . =  '  '  .  $ attr  .  ' = " '  .  $ value  .  ' " ' ;
				}
			}
			// Définit un typeflag pour tester facilement s'il s'agit d'un linkmod ou non.
			$ linkmod_type  =  self :: get_linkmod_type ( $ linkmod_classes );
			// COMMENCE à ajouter le contenu de l'élément interne à la sortie.
			$ item_output  =  isset ( $ args -> avant )? $ args -> avant : ' ' ;
			/ *
			 * C'est le début de l'élément de navigation interne. Selon ce que
			 * type de linkmod que nous avons, nous pouvons avoir besoin de différents éléments wrapper.
			 * /
			if ( ' '  ! ==  $ linkmod_type ) {
				// Est linkmod, affiche l'ouvreur d'élément requis.
				$ item_output  . =  self :: linkmod_element_open ( $ linkmod_type , $ attributes );
			} else {
				// Sans type de mod de lien défini, il doit s'agir d'une balise <a> standard.
				$ item_output  . =  ' <a '  .  $ attributs  .  ' > ' ;
			}
			/ *
			 * Initiez l'icône vide var, puis si nous avons une chaîne contenant
			 * Les classes d'icônes forment le balisage d'icône avec un élément <i>. C'est
			 * sortie à l'intérieur de l'élément avant le titre $ (le texte du lien).
			 * /
			$ icon_html  =  ' ' ;
			if ( !  empty ( $ icon_class_string )) {
				// Ajoutez un <i> avec les classes d'icônes à ce qui est sorti avant les liens.
				$ icon_html  =  ' <i class = " '  . esc_attr ( $ icon_class_string ) .  ' " aria-hidden = "true"> </i> ' ;
			}
			/ * * Ce filtre est documenté dans wp-includes / post-template.php * /
			$ title  = apply_filters ( ' le_titre ' , esc_html ( $ item -> title ), $ item -> ID );
			/ **
			 * Filtre le titre d'un élément de menu.
			 *
			 * @since WP 4.4.0
			 *
			 * @param string $ title Le titre de l'élément de menu.
			 * @param WP_Post $ item L'élément de menu actuel.
			 * @param stdClass $ args Un objet d'arguments wp_nav_menu ().
			 * @param int $ depth Profondeur de l'élément de menu. Utilisé pour le rembourrage.
			 * /
			$ title  = apply_filters ( ' nav_menu_item_title ' , $ title , $ item , $ args , $ depth );
			// Si la classe .sr-only a été définie, s'applique uniquement au texte des éléments de navigation.
			if ( in_array ( ' sr-only ' , $ linkmod_classes , true )) {
				$ title          =  self :: wrap_for_screen_reader ( $ title );
				$ keys_to_unset  =  array_keys ( $ linkmod_classes , ' sr-only ' , true );
				foreach ( $ keys_to_unset  as  $ k ) {
					unset ( $ linkmod_classes [ $ k ]);
				}
			}
			// Placer le contenu de l'élément dans $ output.
			$ item_output  . =  isset ( $ args -> link_before )? $ args -> link_before  .  $ icon_html  .  $ title  .  $ args -> link_after : ' ' ;
			/ *
			 * Ceci est la fin de l'élément de navigation interne. Nous devons fermer le
			 * élément correct selon le type de lien ou le mod de lien.
			 * /
			if ( ' '  ! ==  $ linkmod_type ) {
				// Est linkmod, affiche l'élément de fermeture requis.
				$ item_output  . =  self :: linkmod_element_close ( $ linkmod_type );
			} else {
				// Sans type de mod de lien défini, il doit s'agir d'une balise <a> standard.
				$ item_output  . =  ' </a> ' ;
			}
			$ item_output  . =  isset ( $ args -> after )? $ args -> après : ' ' ;
			// END ajoute le contenu de l'élément interne à la sortie.
			$ output  . = apply_filters ( ' walker_nav_menu_start_el ' , $ item_output , $ item , $ depth , $ args );
		}
		/ **
		 * Traverser les éléments pour créer une liste à partir des éléments.
		 *
		 * Afficher un élément si l'élément n'a pas d'enfants sinon,
		 * afficher l'élément et ses enfants. Traversera uniquement au maximum
		 * profondeur et non ignorer les éléments sous cette profondeur. Il est possible de régler
		 * profondeur max pour inclure toutes les profondeurs, voir méthode walk ().
		 *
		 * Cette méthode ne doit pas être appelée directement, utilisez plutôt la méthode walk ().
		 *
		 * @since WP 2.5.0
		 *
		 * @see Walker :: start_lvl ()
		 *
		 * @param object $ element Objet de données.
		 * @param array $ children_elements Liste des éléments à continuer à parcourir (transmis par référence).
		 * @param int $ max_depth Profondeur maximale à parcourir.
		 * @param int $ depth Profondeur de l'élément actuel.
		 * @param array $ args Un tableau d'arguments.
		 * @param string $ output Utilisé pour ajouter du contenu supplémentaire (transmis par référence).
		 * /
		 fonction  publique display_element ( $ element , & $ children_elements , $ max_depth , $ depth , $ args , & $ output ) {
			if ( !  $ element ) {
				retour ; }
			$ id_field  =  $ this -> db_fields [ ' id ' ];
			// Affiche cet élément.
			if ( is_object ( $ args [ 0 ])) {
				$ args [ 0 ] -> has_children  =  !  empty ( $ children_elements [ $ element -> $ id_field ]); }
			parent :: display_element ( $ element , $ children_elements , $ max_depth , $ depth , $ args , $ output );
		}
		/ **
		 * Menu de secours.
		 *
		 * Si cette fonction est affectée à la variable fallback_cb de wp_nav_menu
		 * et aucun menu n'a été attribué à l'emplacement du thème dans WordPress
		 * gestionnaire de menu la fonction avec rien afficher à un utilisateur non connecté,
		 * et ajoutera un lien vers le gestionnaire de menus WordPress si vous êtes connecté en tant qu'administrateur.
		 *
		 * @param array $ args transmis depuis la fonction wp_nav_menu.
		 * /
		 repli de la fonction statique  publique ( $ args ) { 
			if (current_user_can ( ' edit_theme_options ' )) {
				// Récupère les arguments.
				$ container        =  $ args [ ' container ' ];
				$ container_id     =  $ args [ ' container_id ' ];
				$ container_class  =  $ args [ ' container_class ' ];
				$ menu_class       =  $ args [ ' menu_class ' ];
				$ menu_id          =  $ args [ ' menu_id ' ];
				// Initialise var pour stocker le HTML de secours.
				$ fallback_output  =  ' ' ;
				if ( $ container ) {
					$ fallback_output  . =  ' < '  . esc_attr ( $ container );
					if ( $ container_id ) {
						$ fallback_output  . =  ' id = " '  . esc_attr ( $ container_id ) .  ' " ' ;
					}
					if ( $ container_class ) {
						$ fallback_output  . =  ' class = " '  . esc_attr ( $ container_class ) .  ' " ' ;
					}
					$ fallback_output  . =  ' > ' ;
				}
				$ fallback_output  . =  ' <ul ' ;
				if ( $ menu_id ) {
					$ fallback_output  . =  ' id = " '  . esc_attr ( $ menu_id ) .  ' " ' ; }
				if ( $ menu_class ) {
					$ fallback_output  . =  ' class = " '  . esc_attr ( $ menu_class ) .  ' " ' ; }
				$ fallback_output  . =  ' > ' ;
				$ fallback_output  . =  ' <li class = "nav-item"> <a href = " '  . esc_url (admin_url ( ' nav-menus.php ' )) .  ' " class = "nav-link" title = " '  . esc_attr __ ( ' Ajouter un menu ' , ' wp-bootstrap-navwalker ' ) .  ' "> '  . esc_html __ ( ' Ajouter un menu ' , ' wp-bootstrap-navwalker ' ) .  " </a>
				$ fallback_output  . =  ' </ul> ' ;
				if ( $ container ) {
					$ fallback_output  . =  ' </ '  . esc_attr ( $ conteneur ) .  ' > ' ;
				}
				// Si $ args a la clé 'echo' et c'est vrai echo, sinon retourne.
				if ( array_key_exists ( ' echo ' , $ args ) &&  $ args [ ' echo ' ]) {
					echo  $ fallback_output ; // WPCS: XSS OK.
				} else {
					return  $ fallback_output ;
				}
			}
		}
		/ **
		 * Trouvez toutes les classes de linkmod ou d'icônes personnalisées et stockez-les dans leur support
		 * les tableaux les suppriment ensuite du tableau des classes principales.
		 *
		 * Modules de liaison pris en charge: .disabled, .dropdown-header, .dropdown-divider, .sr-only
		 * Jeux d'icônes pris en charge: Font Awesome 4/5, Glypicons
		 *
		 * REMARQUE: cela accepte les tableaux de liens et d'icônes par référence.
		 *
		 * @since 4.0.0
		 *
		 * @param array $ classes un tableau de classes actuellement assignées à l'élément.
		 * @param array $ linkmod_classe un tableau pour contenir les classes linkmod.
		 * @param array $ icon_classes un tableau pour contenir les classes d'icônes.
		 * @param integer $ depth un entier contenant le niveau de profondeur actuel.
		 *
		 * @return array $ classes un tableau de noms de classes peut-être modifié.
		 * /
		privé  fonction  separate_linkmods_and_icons_from_classes ( les classes $ , & $ linkmod_classes , & $ icon_classes , $ profondeur ) {
			// Parcourez le tableau $ classes pour trouver les classes linkmod ou icon.
			foreach ( $ classes  as  $ key  =>  $ class ) {
				/ *
				 * Si des classes spéciales sont trouvées, stockez la classe dans son
				 * tableau de support et et définissez l'élément de $ classes.
				 * /
				if ( preg_match ( '/ ^ disabled | ^ sr-only / i' , $ class )) {
					// Test pour les classes .disabled ou .sr-only.
					$ linkmod_classes [] =  $ class ;
					unset ( $ classes [ $ clé ]);
				} elseif ( preg_match ( '/ ^ dropdown-header | ^ dropdown-divider | ^ dropdown-item-text / i' , $ class ) &&  $ depth  >  0 ) {
					/ *
					 * Test pour .dropdown-header ou .dropdown-divider et un
					 * profondeur supérieure à 0 - IE dans une liste déroulante.
					 * /
					$ linkmod_classes [] =  $ class ;
					unset ( $ classes [ $ clé ]);
				} elseif ( preg_match ( '/ ^ fa- ( \ S * )? | ^ fa (s | r | l | b)? ( \ s ?)? $ / i' , $ class )) {
					// Font Awesome.
					$ icon_classes [] =  $ class ;
					unset ( $ classes [ $ clé ]);
				} elseif ( preg_match ( '/ ^ glyphicon- ( \ S * )? | ^ glyphicon ( \ s ?) $ / i' , $ class )) {
					// Glyphicons.
					$ icon_classes [] =  $ class ;
					unset ( $ classes [ $ clé ]);
				}
			}
			return  $ classes ;
		}
		/ **
		 * Renvoie une chaîne contenant un type de linkmod et met à jour le tableau $ atts
		 * en conséquence en fonction de la décision.
		 *
		 * @since 4.0.0
		 *
		 * @param array $ linkmod_classes tableau de toutes les classes de modificateurs de liens.
		 *
		 * Chaîne @return vide par défaut, sinon une chaîne de type linkmod.
		 * /
		 fonction  privée get_linkmod_type ( $ linkmod_classes  =  array ()) {
			$ linkmod_type  =  ' ' ;
			// Parcourez un tableau de classes linkmod pour gérer leurs $ atts.
			if ( !  vide ( $ linkmod_classes )) {
				foreach ( $ linkmod_classes  as  $ link_class ) {
					if ( !  vide ( $ link_class )) {
						// Vérifiez les types de classe spéciaux et définissez un indicateur pour eux.
						if ( ' dropdown-header '  ===  $ link_class ) {
							$ linkmod_type  =  ' dropdown-header ' ;
						} elseif ( ' dropdown-divider '  ===  $ link_class ) {
							$ linkmod_type  =  ' diviseur déroulant ' ;
						} elseif ( ' dropdown-item-text '  ===  $ link_class ) {
							$ linkmod_type  =  ' dropdown-item-text ' ;
						}
					}
				}
			}
			return  $ linkmod_type ;
		}
		/ **
		 * Mettez à jour les attributs d'un élément de navigation en fonction des classes de limkmod.
		 *
		 * @since 4.0.0
		 *
		 * @param array $ atts tableau d'atts pour le lien actuel dans l'élément nav.
		 * @param array $ linkmod_classes un tableau de classes qui modifient les comportements ou les affichages des éléments de lien ou de navigation.
		 *
		 * Le tableau @return peut être un tableau d'attributs mis à jour pour l'élément.
		 * /
		 fonction  privée update_atts_for_linkmod_type ( $ atts  =  array (), $ linkmod_classes  =  array ()) {
			if ( !  vide ( $ linkmod_classes )) {
				foreach ( $ linkmod_classes  as  $ link_class ) {
					if ( !  vide ( $ link_class )) {
						/ *
						 * Mettre à jour $ atts avec un espace et le nom de classe supplémentaire
						 * tant qu'il ne s'agit pas d'une classe réservée aux seuls.
						 * /
						if ( ' sr-only '  ! ==  $ link_class ) {
							$ atts [ ' class ' ] . =  '  '  . esc_attr ( $ link_class );
						}
						// Vérifiez les types de classe spéciaux pour lesquels nous avons besoin d'une gestion supplémentaire.
						if ( ' désactivé '  ===  $ link_class ) {
							// Convertit le lien en '#' et désactive les cibles ouvertes.
							$ atts [ ' href ' ] =  ' # ' ;
							unset ( $ atts [ ' target ' ]);
						} elseif ( ' dropdown-header '  ===  $ link_class  ||  ' dropdown-divider '  ===  $ link_class  ||  ' dropdown-item-text '  ===  $ link_class ) {
							// Stocke un indicateur de type et désactive href et target.
							unset ( $ atts [ ' href ' ]);
							unset ( $ atts [ ' target ' ]);
						}
					}
				}
			}
			retourner  $ atts ;
		}
		/ **
		 * Enveloppe le texte passé dans une classe de lecteur d'écran uniquement.
		 *
		 * @since 4.0.0
		 *
		 * @param string $ text la chaîne de texte à encapsuler dans une classe de lecteur d'écran.
		 * @return string la chaîne enveloppée dans un intervalle avec la classe.
		 * /
		 fonction  privée wrap_for_screen_reader ( $ text  =  ' ' ) {
			if ( $ text ) {
				$ text  =  ' <span class = "sr-only"> '  .  $ text  .  « </span> » ;
			}
			return  $ text ;
		}
		/ **
		 * Renvoie l'élément d'ouverture et les attributs corrects pour un linkmod.
		 *
		 * @since 4.0.0
		 *
		 * @param string $ linkmod_type une piqûre contenant un indicateur de type linkmod.
		 * @param string $ attributes une chaîne d'attributs à ajouter à l'élément.
		 *
		 * @return string une chaîne avec la balise openign pour l'élément avec des attributs ajoutés.
		 * /
		 fonction  privée linkmod_element_open ( $ linkmod_type , $ attributes  =  ' ' ) {
			$ output  =  ' ' ;
			if ( ' dropdown-item-text '  ===  $ linkmod_type ) {
				$ output  . =  ' <span class = "dropdown-item-text" '  .  $ attributs  .  ' > ' ;
			} elseif ( ' dropdown-header '  ===  $ linkmod_type ) {
				/ *
				 * Pour un en-tête, utilisez un span avec la classe .h6 au lieu d'un vrai
				 * balise d'en-tête pour ne pas confondre les lecteurs d'écran.
				 * /
				$ output  . =  ' <span class = "dropdown-header h6" '  .  $ attributs  .  ' > ' ;
			} elseif ( ' dropdown-divider '  ===  $ linkmod_type ) {
				// Ceci est un diviseur.
				$ output  . =  ' <div class = "dropdown-divider" '  .  $ attributs  .  ' > ' ;
			}
			return  $ output ;
		}
		/ **
		 * Renvoie la balise de fermeture correcte pour l'élément linkmod.
		 *
		 * @since 4.0.0
		 *
		 * @param string $ linkmod_type une chaîne contenant un type de linkmod spécial.
		 *
		 * @return string une chaîne avec la balise de fermeture pour ce type de linkmod.
		 * /
		 fonction  privée linkmod_element_close ( $ linkmod_type ) {
			$ output  =  ' ' ;
			if ( ' dropdown-header '  ===  $ linkmod_type  ||  ' dropdown-item-text '  ===  $ linkmod_type ) {
				/ *
				 * Pour un en-tête, utilisez un span avec la classe .h6 au lieu d'un vrai
				 * balise d'en-tête pour ne pas confondre les lecteurs d'écran.
				 * /
				$ output  . =  ' </span> ' ;
			} elseif ( ' dropdown-divider '  ===  $ linkmod_type ) {
				// Ceci est un diviseur.
				$ output  . =  ' </div> ' ;
			}
			return  $ output ;
		}
	}
}