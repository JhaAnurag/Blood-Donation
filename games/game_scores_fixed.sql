-- Create game_scores table if it doesn't exist
CREATE TABLE IF NOT EXISTS game_scores (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  game_type varchar(50) NOT NULL,
  score int(11) NOT NULL,
  created_at datetime NOT NULL,
  updated_at datetime NOT NULL,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY game_type (game_type),
  CONSTRAINT game_scores_ibfk_1 FOREIGN KEY (user_id) REFERENCES donors (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
