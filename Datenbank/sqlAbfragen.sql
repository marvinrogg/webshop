/*Produkt*/
Select p.*
from produkt p, unterkategorie uk, kategorie k
Where k.name='?'
and uk.name='?';

/*Unterkategorien*/
select uk.name
from unterkategorie uk, kategorie k
where k.name='';


/*Kategorien*/
select name
from kategorie;


/*Produktname*/
Select id
from produkt
Where name='?';

Select *
from Produkt
where Unterkategorie_id =1
OR Unterkategorie_id =2
;


INSERT INTO `Cemquarium`.`Warenkorb` (`id`, `User_username`) VALUES (1, 'Cem');
INSERT INTO `Cemquarium`.`Warenkorb_has_Produkt` (`Warenkorb_id`, `Produkt_id`) VALUES (1, 1);
DELETE FROM Warenkorb_has_Produkt WHERE Produkt_id=1;
DELETE FROM Warenkorb WHERE id=1;