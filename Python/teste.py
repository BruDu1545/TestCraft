import requests
from bs4 import BeautifulSoup

# Defina o User-Agent para evitar bloqueios
headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
}

rst_url = requests.get('https://lista.mercadolivre.com.br/veiculos/carros-caminhonetes/?new_categories_landing=false', headers=headers)
html_url = rst_url.text

soup = BeautifulSoup(html_url, 'html.parser')
cards = soup.find_all('li', class_='ui-search-layout__item')

cars = []

for card in cards:
    information = ""
    
    # Encontrar a lista de atributos, se disponível
    infos = card.find('ul', class_='ui-search-card-attributes ui-search-item__group__element')

    if infos:  # Verifique se a lista de atributos existe
        for attribute in infos.find_all('li'):
            info = attribute.get_text().strip()
            if info:  # Verifique se o texto do atributo não está vazio
                information += str(info) + " | "

    # Imprimir as informações extraídas, se houver
    if information:
        print(information)
