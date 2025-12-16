<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251215092848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_services (client_id INT NOT NULL, services_id INT NOT NULL, INDEX IDX_5DD4D1AC19EB6921 (client_id), INDEX IDX_5DD4D1ACAEF5A6C1 (services_id), PRIMARY KEY (client_id, services_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE client_services ADD CONSTRAINT FK_5DD4D1AC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_services ADD CONSTRAINT FK_5DD4D1ACAEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client DROP services');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_services DROP FOREIGN KEY FK_5DD4D1AC19EB6921');
        $this->addSql('ALTER TABLE client_services DROP FOREIGN KEY FK_5DD4D1ACAEF5A6C1');
        $this->addSql('DROP TABLE client_services');
        $this->addSql('ALTER TABLE client ADD services JSON NOT NULL');
    }
}
