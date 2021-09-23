<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Correction;

use Paillechat\Enum\Enum;

/**
 * @method static self SELF()
 * @method static self MVD()
 * @method static self MCHS()
 * @method static self MID()
 * @method static self ROSSOTRUDNICHESTVO()
 * @method static self MIN_OBORONI_RF()
 * @method static self FSVTS()
 * @method static self FSTEK()
 * @method static self MU()
 * @method static self FSIN()
 * @method static self FSSP()
 * @method static self GFS()
 * @method static self SVR()
 * @method static self FSB()
 * @method static self FSVNG()
 * @method static self FSO()
 * @method static self FIN_MANITORING()
 * @method static self FAA()
 * @method static self GUSPP()
 * @method static self UDP()
 * @method static self MIN_ZDRAV()
 * @method static self FSNSZ()
 * @method static self MK()
 * @method static self MNVO()
 * @method static self MPRE()
 * @method static self FSGMOS()
 * @method static self FSNSP()
 * @method static self FAVR()
 * @method static self FALH()
 * @method static self FAN()
 * @method static self MPT()
 * @method static self FATRM()
 * @method static self MP()
 * @method static self MRFRDVA()
 * @method static self MSH()
 * @method static self FSVFN()
 * @method static self FAR()
 * @method static self MS()
 * @method static self MSZHKH()
 * @method static self MT()
 * @method static self FSNST()
 * @method static self FAVT()
 * @method static self FDA()
 * @method static self FAZHT()
 * @method static self FAMRT()
 * @method static self MTSZ()
 * @method static self FSTZ()
 * @method static self MF()
 * @method static self FNS()
 * @method static self FPP()
 * @method static self FSRAR()
 * @method static self FTS()
 * @method static self FK()
 * @method static self FAUGI()
 * @method static self MCRSMK()
 * @method static self FSNSSITMK()
 * @method static self FAPMK()
 * @method static self AS()
 * @method static self MER()
 * @method static self FSA()
 * @method static self FSGS()
 * @method static self FSIS()
 * @method static self FAT()
 * @method static self ME()
 * @method static self FAS()
 * @method static self FSGRKK()
 * @method static self FSNSZPPBCH()
 * @method static self FSNSON()
 * @method static self FSETAN()
 * @method static self FAGR()
 * @method static self FMBA()
 * @method static self FADM()
 * @method static self FADN()
 */
final class FederalId extends Enum
{
    protected const MVD = '001'; // Министерство внутренних дел Российской Федерации
    protected const MCHS = '002'; // Министерство Российской Федерации по делам гражданской обороны, чрезвычайным ситуациям и ликвидации последствий стихийных бедствий
    protected const MID = '003'; // Министерство иностранных дел Российской Федерации
    protected const ROSSOTRUDNICHESTVO = '004'; // Федеральное агентство по делам Содружества Независимых Государств, соотечественников, проживающих за рубежом, и по международному гуманитарному сотрудничеству
    protected const MIN_OBORONI_RF = '005'; // Министерство обороны Российской Федерации
    protected const FSVTS = '006'; // Федеральная служба по военно-техническому сотрудничеству
    protected const FSTEK = '007'; // Федеральная служба по техническому и экспортному контролю
    protected const MU = '008'; // Министерство юстиции Российской Федерации
    protected const FSIN = '009'; // Федеральная служба исполнения наказаний
    protected const FSSP = '010'; // Федеральная служба судебных приставов
    protected const GFS = '011'; // Государственная фельдъегерская служба Российской Федерации (федеральная служба)
    protected const SVR = '012'; // Служба внешней разведки Российской Федерации (федеральная служба)
    protected const FSB = '013'; // Федеральная служба безопасности Российской Федерации (федеральная служба)
    protected const FSVNG = '014'; // Федеральная служба войск национальной гвардии Российской Федерации (федеральная служба)
    protected const FSO = '015'; // Федеральная служба охраны Российской Федерации (федеральная служба)
    protected const FIN_MANITORING = '016'; // Федеральная служба по финансовому мониторингу (федеральная служба)
    protected const FAA = '017'; // Федеральное архивное агентство (федеральное агентство)
    protected const GUSPP = '018'; // Главное управление специальных программ Президента Российской Федерации (федеральное агентство)
    protected const UDP = '019'; // Управление делами Президента Российской Федерации (федеральное агентство)
    protected const MIN_ZDRAV = '020'; // Министерство здравоохранения Российской Федерации
    protected const FSNSZ = '021'; // Федеральная служба по надзору в сфере здравоохранения
    protected const MK = '022'; // Министерство культуры Российской Федерации
    protected const MNVO = '023'; // Министерство науки и высшего образования Российской Федерации
    protected const MPRE = '024'; // Министерство природных ресурсов и экологии Российской Федерации
    protected const FSGMOS = '025'; // Федеральная служба по гидрометеорологии и мониторингу окружающей среды
    protected const FSNSP = '026'; // Федеральная служба по надзору в сфере природопользования
    protected const FAVR = '027'; // Федеральное агентство водных ресурсов
    protected const FALH = '028'; // Федеральное агентство лесного хозяйства
    protected const FAN = '029'; // Федеральное агентство по недропользованию
    protected const MPT = '030'; // Министерство промышленности и торговли Российской Федерации
    protected const FATRM = '031'; // Федеральное агентство по техническому регулированию и метрологии
    protected const MP = '032'; // Министерство просвещения Российской Федерации
    protected const MRFRDVA = '033'; // Министерство Российской Федерации по развитию Дальнего Востока и Арктики
    protected const MSH = '034'; // Министерство сельского хозяйства Российской Федерации
    protected const FSVFN = '035'; // Федеральная служба по ветеринарному и фитосанитарному надзору
    protected const FAR = '036'; // Федеральное агентство по рыболовству
    protected const MS = '037'; // Министерство спорта Российской Федерации
    protected const MSZHKH = '038'; // Министерство строительства и жилищно-коммунального хозяйства Российской Федерации
    protected const MT = '039'; // Министерство транспорта Российской Федерации
    protected const FSNST = '040'; // Федеральная служба по надзору в сфере транспорта
    protected const FAVT = '041'; // Федеральное агентство воздушного транспорта
    protected const FDA = '042'; // Федеральное дорожное агентство
    protected const FAZHT = '043'; // Федеральное агентство железнодорожного транспорта
    protected const FAMRT = '044'; // Федеральное агентство морского и речного транспорта
    protected const MTSZ = '045'; // Министерство труда и социальной защиты Российской Федерации
    protected const FSTZ = '046'; // Федеральная служба по труду и занятости
    protected const MF = '047'; // Министерство финансов Российской Федерации
    protected const FNS = '048'; // Федеральная налоговая служба
    protected const FPP = '049'; // Федеральная пробирная палата (федеральная служба)
    protected const FSRAR = '050'; // Федеральная служба по регулированию алкогольного рынка
    protected const FTS = '051'; // Федеральная таможенная служба
    protected const FK = '052'; // Федеральное казначейство (федеральная служба)
    protected const FAUGI = '053'; // Федеральное агентство по управлению государственным имуществом
    protected const MCRSMK = '054'; // Министерство цифрового развития, связи и массовых коммуникаций Российской Федерации
    protected const FSNSSITMK = '055'; // Федеральная служба по надзору в сфере связи, информационных технологий и массовых коммуникаций
    protected const FAPMK = '056'; // Федеральное агентство по печати и массовым коммуникациям
    protected const AS = '057'; // Федеральное агентство связи
    protected const MER = '058'; // Министерство экономического развития Российской Федерации
    protected const FSA = '059'; // Федеральная служба по аккредитации
    protected const FSGS = '060'; // Федеральная служба государственной статистики
    protected const FSIS = '061'; // Федеральная служба по интеллектуальной собственности
    protected const FAT = '062'; // Федеральное агентство по туризму
    protected const ME = '063'; // Министерство энергетики Российской Федерации
    protected const FAS = '064'; // Федеральная антимонопольная служба
    protected const FSGRKK = '065'; // Федеральная служба государственной регистрации, кадастра и картографии
    protected const FSNSZPPBCH = '066'; // Федеральная служба по надзору в сфере защиты прав потребителей и благополучия человека
    protected const FSNSON = '067'; // Федеральная служба по надзору в сфере образования и науки
    protected const FSETAN = '068'; // Федеральная служба по экологическому, технологическому и атомному надзору
    protected const FAGR = '069'; // Федеральное агентство по государственным резервам
    protected const FMBA = '070'; // Федеральное медико-биологическое агентство
    protected const FADM = '071'; // Федеральное агентство по делам молодежи
    protected const FADN = '072'; // Федеральное агентство по делам национальностей
}
