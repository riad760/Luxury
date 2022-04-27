<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427092958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_offer_user (job_offer_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_191C68433481D195 (job_offer_id), INDEX IDX_191C6843A76ED395 (user_id), PRIMARY KEY(job_offer_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer_user ADD CONSTRAINT FK_191C68433481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_user ADD CONSTRAINT FK_191C6843A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E19EB6921 ON job_offer (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE job_offer_user');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E19EB6921');
        $this->addSql('DROP INDEX IDX_288A3A4E19EB6921 ON job_offer');
        $this->addSql('ALTER TABLE job_offer DROP client_id');
    }
}
