from rich.table import Table
from rich.console import Console
from fpdf import FPDF
from web_scraper import all_scrapes

def create_table(data):

    console = Console()

    table = Table(title="Carros Disponíveis")

    table.add_column("Title", justify="left", style="cyan", no_wrap=True)
    table.add_column("Price", justify="right", style="green")
    table.add_column("Information", justify="left", style="magenta")
    table.add_column("Link", justify="left", style="blue")

    for item in data:
        table.add_row(item['title'], item['price'], item['information'], item['link'])

    console.print(table)


def generate_pdf(data):
    
    pass