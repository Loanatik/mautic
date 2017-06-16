<?php

/*
 * @package     Mautic
 * @copyright   2017 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\Migrations;

use Mautic\CoreBundle\Doctrine\AbstractMauticMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\SkipMigrationException;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170616132829 extends AbstractMauticMigration
{
    /**
     * @param Schema $schema
     *
     * @throws SkipMigrationException
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    public function preUp(Schema $schema)
    {
        $table = $schema->getTable($this->prefix.'emails');

        if ($table->hasColumn('to_address') && $table->getColumn('to_address')->getNotNull() === false) {
            throw new SkipMigrationException('Schema includes this migration');
        }

        if ($table->hasColumn('cc_address') && $table->getColumn('cc_address')->getNotNull() === false) {
            throw new SkipMigrationException('Schema includes this migration');
        }
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // Please modify to your needs
        $this->addSql('ALTER TABLE '.$this->prefix.'emails ADD to_address VARCHAR(255);');
        $this->addSql('ALTER TABLE '.$this->prefix.'emails ADD cc_address VARCHAR(255);');
    }
}
