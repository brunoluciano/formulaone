TRUNCATE score_drivers;
TRUNCATE score_teams;
TRUNCATE score_camp;
TRUNCATE races;
TRUNCATE campeonato;
TRUNCATE seasons;
UPDATE drivers SET titulos = 0, vitorias = 0, podios = 0, pole_positions = 0;
UPDATE teams SET vitorias = 0;
UPDATE tracks SET last_win_id = NULL;

-- DESATIVAR VERIFICAÇÃO DE CHAVES ESTRANGEIRAS NO PHPMYADMIN
