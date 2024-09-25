import requests
from bs4 import BeautifulSoup


def get_next_url(url):
    rst_url = requests.get(url)
    html_url = rst_url.text

    soup = BeautifulSoup(html_url, 'html.parser')
    nextUrl = soup.find('a', title='Seguinte').get('href')
    
    return nextUrl


def get_news(url):
    urls = []
    rst_url = requests.get(url)
    html_url = rst_url.text

    soup = BeautifulSoup(html_url, 'html.parser')

    news_items = soup.find_all('li', class_='andes-pagination__button')
    
    for item in news_items:
        a_tag = item.find('a')
        if a_tag:
            link = a_tag.get('href')
            if link:
                urls.append(link)
    
    return (urls)
    

 
def scrapping_Web(*urls):
    for url in urls:
        rst_url = requests.get(url)
        html_url = rst_url.text

        soup = BeautifulSoup(html_url, 'html.parser')
        cards = soup.find_all('li', class_='ui-search-layout__item')

        cars = []

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
            
            cars.append(car)
        
        return cars