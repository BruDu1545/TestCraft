import os
import sys
import pygame
import random 

pygame.init()

def resource_path(relative_path):
    """ Get absolute path to resource, works for dev and for PyInstaller """
    try:
        # PyInstaller creates a temp folder and stores path in _MEIPASS
        base_path = sys._MEIPASS
    except Exception:
        base_path = os.path.abspath(".")

    return os.path.join(base_path, relative_path)

x = 1280
y = 720

background = pygame.image.load(resource_path("bg.png"))
background = pygame.transform.scale(background, (x,y))

player = pygame.image.load(resource_path("aviao.png"))
player = pygame.transform.scale(player, (100,75))

inimigo = pygame.image.load(resource_path("aviao_inimigo.png"))
inimigo = pygame.transform.scale(inimigo, (120,95))

bullet = pygame.image.load(resource_path("municao.png"))
bullet = pygame.transform.scale(bullet, (25, 20))
bullet = pygame.transform.rotate(bullet, (-90))

pos_player_x = 100
pos_player_y = 300

dificulty = 1

vel_bullet = 0
pos_bullet_x = pos_player_x 
pos_bullet_y = pos_player_y + 15

pos_inimigo_x = 800
pos_inimigo_y = 360

screen = pygame.display.set_mode((x, y))

pygame.display.set_caption("Jogo da primeira guerra mundial")

font = pygame.font.SysFont(None, 48)

index = 0

heart01 = (255, 0, 0)
heart02 = (255, 0, 0)
heart03 = (255, 0, 0)

player_rect = player.get_rect(topleft=(pos_player_x, pos_player_y))
inimigo_rect = inimigo.get_rect(topleft=(pos_inimigo_x, pos_inimigo_y))
bullet_rect = bullet.get_rect(topleft=(pos_bullet_x, pos_bullet_y))

def respawn():
    x = 1350
    y = random.randint(1, 670)
    return [x, y]

def colisions():
    global index, dificulty, heart01, heart02, heart03
    if player_rect.colliderect(inimigo_rect) or pos_inimigo_x == 60:
        if heart01 == (255, 0, 0):
            heart01 = (128, 128, 128)
        elif heart02 == (255, 0, 0):
            heart02 = (128, 128, 128)
        elif heart03 == (255, 0, 0):
            heart03 = (128, 128, 128)
        return True
    elif bullet_rect.colliderect(inimigo_rect):
        index += 1
        dificulty += 0.1
        return True
    else:
        return False

clock = pygame.time.Clock()

executor = False
atirar = False

while executor:

    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            executor = False
    
    screen.blit(background,(0,0))
    rel_x = x % background.get_rect().width
    screen.blit(background, (rel_x - background.get_rect().width, 0)) 

    if rel_x < 1280:
        screen.blit(background, (rel_x, 0))      
        
    key_press = pygame.key.get_pressed()
    if key_press[pygame.K_UP] and pos_player_y >  1:
        pos_player_y -= (1 + dificulty)
        if not atirar:
            pos_bullet_y -= (1 + dificulty)

    if key_press[pygame.K_DOWN] and pos_player_y < 645:
        pos_player_y += (1 + dificulty)
        if not atirar:
            pos_bullet_y += (1 + dificulty)
            
    if key_press[pygame.K_SPACE]:
        atirar = True
        vel_bullet = (3 + dificulty)

    if pos_bullet_x >= 1280 or bullet_rect.colliderect(inimigo_rect):
        atirar = False
        vel_bullet = 0
        pos_bullet_x = pos_player_x + 10
        pos_bullet_y = pos_player_y + 15
          
    if colisions() or pos_inimigo_x == 60:
        pos_inimigo_x = respawn()[0]
        pos_inimigo_y = respawn()[1]
        
    if (heart01 == (128, 128, 128) and heart02 == (128, 128, 128) and heart03 == (128, 128, 128)):
        executor = False
        
    player_rect.x = pos_player_x
    player_rect.y = pos_player_y
    
    bullet_rect.x = pos_bullet_x
    bullet_rect.y = pos_bullet_y
    
    inimigo_rect.x = pos_inimigo_x
    inimigo_rect.y = pos_inimigo_y
        
        
    x -= 2 + dificulty
    pos_inimigo_x -= 1 + dificulty
    pos_bullet_x += vel_bullet

    pygame.draw.rect(screen, (255, 0, 0), player_rect, -1)
    pygame.draw.rect(screen, (255, 0, 0), bullet_rect, -1)
    pygame.draw.rect(screen, (255, 0, 0), inimigo_rect, -1)

    score = font.render(f'Pontos: {index}', True, (0,0,0))
    screen.blit(score,(50, 50))

    live_score = font.render(f'Vidas:', True, (0,0,0))
    screen.blit(live_score,(1120, 20))
    pygame.draw.circle(screen, (heart01), (1240, 80), 25)
    pygame.draw.circle(screen, (heart02), (1180, 80), 25)
    pygame.draw.circle(screen, (heart03), (1120, 80), 25)

    screen.blit(inimigo, (pos_inimigo_x, pos_inimigo_y))
    screen.blit(bullet, (pos_bullet_x, pos_bullet_y))
    screen.blit(player, (pos_player_x, pos_player_y))

    pygame.display.update()
    print(dificulty)
    clock.tick(120)

    pygame.display.update()