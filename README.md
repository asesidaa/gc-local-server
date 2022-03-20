# GC server

A very much incomplete GC4EX server emulator

Based on https://github.com/fatal-bundy/nesys_at_home

# Usage

1. First patch NesysService.exe, point all url to localhost
2. Generate a self-signed root CA, **with common name=Taito Arcade Machine CA**
3. Use the generated root CA to sign a certificate for localhost
4. Import the generated root CA (**with private key!!**) to Personal and trusted root CA tab
5. On localhost, set up a webserver with whatever program, enable https
6. Create a database, you can change the database config in config/config.inc
7. Create 6 tables, schemas dumped in 2110_card.xml using phpmyadmin
8. For music_unlock and music_extra, backup data are exported to .sql files
9. For card_main, first import the backup data then for card with id 7020392010281502, change the card id and player
   name of your choice
10. Open the game, without nesys emu, you should be able to use the card

# Note

The root CA have to be re-imported every time computer reboots, I don't know why. I am not familiar with that. But it
works.

# Missing functions

- [ ] Coin is fixed at 999999
- [ ] Reward unlocking is broken, wait 60s or the game will crash
