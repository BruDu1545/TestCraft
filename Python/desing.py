from rich.table import Table
from rich.console import Console
import csv 


def save_to_csv(cars):
    file = open('cars.csv', 'a')
    write = csv.writer(file)
    for car in cars:
        write.writerow([car['title'], car['price'], car['information'], car['location'], car['link']])


def create_table(data):

    console = Console()

    table = Table(title="Carros Disponíveis")

    table.add_column("Title", justify="left", style="cyan", no_wrap=True)
    table.add_column("Price", justify="right", style="green")
    table.add_column("Information", justify="left", style="magenta")
    table.add_column("Location", justify="left", style="yellow")
    table.add_column("Link", justify="left", style="blue")

    for item in data:
        table.add_row(item['title'], item['price'], item['information'], item['location'],  item['link'])

    console.print(table)

