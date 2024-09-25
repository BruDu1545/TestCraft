from web_scraper import scrapping_Web, get_news, get_next_url
from desing import create_table, save_to_csv


urlI = ('https://lista.mercadolivre.com.br/veiculos/carros-caminhonetes/?new_categories_landing=false')
urls = get_news(urlI)

for url in urls:
    result = scrapping_Web(url)
    save_to_csv(result)

