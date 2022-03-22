# GC server

A GC4EX local server prototype, feel free to rewrite it and improve.

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

- The root CA have to be re-imported every time computer reboots, I don't know why. I am not familiar with that. But it
  works.
- To make the card reading work, I am currently using teknoparrot to emulate RFiD. However, for IO, I am using jconfig. They can actually be mixed. Just remember to turn off unnecessary emulations.
- To add support in teknoparrot, just follow the GC2 support. Notice you have to apply the same patch on GC2 (mouse scanner and RFID). The offset is different, but you can easily find them since the functions are almost the same.

# Missing functions
- [ ] No ranking of any sort is implemented, since this is just a local server. The stub is there.
- [ ] Coin is fixed at 999999
- [ ] Everything is unlocked at beginning, except for high difficulty and extras.
- [ ] All the item count will always be 90
- [x] ~~Reward unlocking is broken, wait 60s or the game will crash~~ Fixed, but not saving it, just to make the game over faster
