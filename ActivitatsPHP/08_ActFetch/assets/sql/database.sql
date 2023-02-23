CREATE DATABASE act_fetch;
use act_fetch;
CREATE TABLE dictadors (
  id INT PRIMARY KEY ,
  nom VARCHAR(255),
  nacionalitat VARCHAR(255),
  any_mort INT,
  foto VARCHAR(255)
);


INSERT INTO dictadors (id, nom, nacionalitat, any_mort, foto) VALUES
(1, 'Adolf Hitler', 'Alemania', 1945, 'https://commons.wikimedia.org/wiki/File:Bundesarchiv_Bild_183-S33882,_Adolf_Hitler.jpg'),
(2, 'Josef Stalin', 'Unión Soviética', 1953, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/JStalin_Secretary_general_CCCP_1942_flipped.jpg/650px-JStalin_Secretary_general_CCCP_1942_flipped.jpg'),
(3, 'Mao Zedong', 'China', 1976, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Mao_Zedong_1959.jpg/666px-Mao_Zedong_1959.jpg?20230122015835'),
(4, 'Benito Mussolini', 'Italia', 1945, 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Benito_Mussolini_colored.jpg/640px-Benito_Mussolini_colored.jpg'),
(5, 'Francisco Franco', 'España', 1975, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Francisco_Franco_circa_1939.jpg/640px-Francisco_Franco_circa_1939.jpg'),
(6, 'Fidel Castro', 'Cuba', 2016, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Fidel_Castro_1950s.jpg/640px-Fidel_Castro_1950s.jpg'),
(7, 'Pol Pot', 'Camboya', 1998, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Pol_Pot.jpg/712px-Pol_Pot.jpg'),
(8, 'Saddam Hussein', 'Irak', 2006, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Saddam_Hussein_in_1998.png/640px-Saddam_Hussein_in_1998.png'),
(9, 'Augusto Pinochet', 'Chile', 2006, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Augusto_Pinochet_foto_oficial_coloreada.jpg/640px-Augusto_Pinochet_foto_oficial_coloreada.jpg'),
(10, 'Idi Amin', 'Uganda', 2003, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Idi_Amin_at_UN_%28United_Nations%2C_New_York%29_gtfy.00132_%28cropped%29.jpg/640px-Idi_Amin_at_UN_%28United_Nations%2C_New_York%29_gtfy.00132_%28cropped%29.jpg');