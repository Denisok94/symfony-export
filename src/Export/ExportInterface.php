<?php

namespace Denisok94\SymfonyExportBundle\Export;

use Denisok94\SymfonyExportBundle\Exception\ExportException;
use Denisok94\SymfonyExportBundle\Model\ExportBaseInterface;
use Denisok94\SymfonyExportBundle\Model\ExportItemInterface;

/**
 * interface ExportInterface
 * @package Denisok94\SymfonyExportBundle\Export
 */
interface ExportInterface
{
  /**
   * Предварительная подготовка, создание файла экспорта
   * @return self
   * @throws ExportException
   */
  public function start(): self;

  /**
   * Добавить данные в экспорт
   * @param ExportItemInterface $item
   * @param int $i
   * @throws ExportException
   */
  public function parse(ExportItemInterface $item, $i);
  
  /**
   * Объект/файл полученного экспорта
   * @return mixed
   */
  public function getResult(): mixed;

  /**
   * Завершить/закрыть экспорта
   * @throws ExportException
   */
  public function end();

  //----------

  /**
   * Тип/формат экспорта
   * @param string $type 
   * @return self
   * @throws ExportException
   */
  public function setType(string $type): self;

  /**
   * Класс экспорта
   * @param ExportBaseInterface $exportClass 
   * @return self
   */
  public function setExportClass(ExportBaseInterface $exportClass): self;

  //----------

  /**
   * Имя полученного файла
   * @return string
   */
  public function getFileName(): string;

  /**
   * Сам файл экспорта
   * @return mixed
   */
  public function getFile(): mixed;
}
