import requests
from bs4 import BeautifulSoup


def get_next_url(url):
    rst_url = requests.get(url)
    html_url = rst_url.text

    soup = BeautifulSoup(html_url, 'html.parser')
    next_url_tag = soup.find('a', title='Seguinte')
    
    if next_url_tag:
        next_url = next_url_tag.get('href')
        return next_url
    else:
        return None 


def get_news(url):
    urls = []
    rst_url = requests.get(url)
    html_url = rst_url.text

    soup = BeautifulSoup(html_url, 'html.parser')

    pagination_items = soup.find_all('li', class_='andes-pagination__button')
    
    for item in pagination_items:
        a_tag = item.find('a')
        if a_tag:
            link = a_tag.get('href')
            if link:
                urls.append(link)
    
    return urls
    

def scrapping_Web(*urls):
    cars = [] 
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
                'title': card.find('a').get_text().strip() if card.find('a') else 'N/A',
                'price': card.find('span', class_='andes-money-amount__fraction').get_text().strip() if card.find('span', class_='andes-money-amount__fraction') else 'N/A',
                'information': information.strip(' | '),
                'link': card.find('a').get('href') if card.find('a') else 'N/A',
                'location': card.find('span', class_='ui-search-item__group__element ui-search-item__location').get_text().strip() if card.find('span', class_='ui-search-item__group__element ui-search-item__location') else 'N/A',
            }
            
            cars.append(car)
    
    return cars 
