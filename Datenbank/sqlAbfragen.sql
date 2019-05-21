/*Produkt*/
Select p.name
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