<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123114855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `event_streams` (
              `no` BIGINT(20) NOT NULL AUTO_INCREMENT,
              `real_stream_name` VARCHAR(150) NOT NULL,
              `stream_name` CHAR(41) NOT NULL,
              `metadata` JSON,
              `category` VARCHAR(150),
              PRIMARY KEY (`no`),
              UNIQUE KEY `ix_rsn` (`real_stream_name`),
              KEY `ix_cat` (`category`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
        ');
    }

    public function down(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP TABLE `event_streams`');
    }
}
