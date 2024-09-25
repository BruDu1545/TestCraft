import requests
from bs4 import BeautifulSoup

# Função para obter URLs de paginação
def get_news(url):
    urls = []
    rst_url = requests.get(url)
    html_url = rst_url.text

    soup = BeautifulSoup(html_url, 'html.parser')

    # Encontrar links de paginação
    news_items = soup.find_all('li', class_='andes-pagination__button')
    
    for item in news_items:
        a_tag = item.find('a')
        if a_tag:
            link = a_tag.get('href')
            if link:
                urls.append(link)
    
    return urls  # Retorna a lista de URLs


# Função para realizar scraping usando URLs obtidas de get_news
def scrapping_Web(urls):
    all_cars = []  # Lista para armazenar todos os carros

    for url in urls:
        rst_url = requests.get(url)
        html_url = rst_url.text

        soup = BeautifulSoup(html_url, 'html.parser')
        cards = soup.find_all('li', class_='ui-search-layout__item')

        for card in cards:
            information = ""
            infos = card.find_all('li', class_='ui-search-card-attributes__attribute')
            
            for attribute in infos:
                info = attribute.get_text().strip()
                information += str(info) + " | "
            
            car = {
                'title': card.find('a').get_text().strip(),
                'price': card.find('span', class_='andes-money-amount__fraction').get_text().strip(),
                'information': information.strip(' | '),
                'link': card.find('a').get('href')
            }

            all_cars.append(car)  # Adiciona o carro à lista total
    
    return all_cars  # Retorna todos os carros coletados

# Exemplo de uso
url_to_scrap = "https://lista.mercadolivre.com.br/veiculos/carros-caminhonetes"  # URL inicial
pagination_urls = get_news(url_to_scrap)  # Obtém as URLs de paginação
cars = scrapping_Web(pagination_urls)  # Realiza o scraping usando as URLs obtidas

print(cars)  # Exibe os carros coletados
