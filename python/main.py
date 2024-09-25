from web_scraper import scrapping_Web, get_news, get_next_url 
from desing import create_table

print(create_table(scrapping_Web(get_news('https://lista.mercadolivre.com.br/veiculos/carros-caminhonetes/?new_categories_landing=false'))))

