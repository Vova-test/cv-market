<?php

namespace Tests\Unit;

use App\Repositories\EncounterAssessmentRepository;
use App\Services\EncounterAssessmentService;
use App\Services\PatientIssueService;
use Mockery;
use Tests\TestUnitCase;

/**
 * @coversNothing
 */
class EncounterAssessmentServiceTest extends TestUnitCase
{
    public function testGetAssessments()
    {
        $repositoryMock          = Mockery::mock(EncounterAssessmentRepository::class);
        $patientIssueServiceMock = Mockery::mock(PatientIssueService::class);

        $repositoryMock->shouldReceive('getAssessments')
                    ->once()
                    ->andReturn([
                        [
                            "id"           => "3374be52-cf9c-42f1-862e-9ff2459f5d40",
                            "encounter_id" => "8aa02a28-0797-481b-a503-2ef496b493ed",
                            "issue_id"     => "fbd1ee56-c987-4b1b-8a6b-75e5b8fe7967",
                            "assessment"   => "Clinically stable, euvolemic, does not appear to be in acute CHF at this time",
                            "plan"         => "Will f/u in one month",
                            "assigned_by"  => "af406f8e-260d-4d81-9827-ba9301ebd41f",
                            "created_at"   => "2020-01-13 10:37:45",
                            "updated_at"   => "2020-01-13 10:37:45",
                        ],
                    ]);

        $encounterAssessmentService = new EncounterAssessmentService($repositoryMock, $patientIssueServiceMock);

        $this->assertEquals(['assessments' => [
                                "fbd1ee56-c987-4b1b-8a6b-75e5b8fe7967" => [
                                    "id"           => "3374be52-cf9c-42f1-862e-9ff2459f5d40",
                                    "encounter_id" => "8aa02a28-0797-481b-a503-2ef496b493ed",
                                    "issue_id"     => "fbd1ee56-c987-4b1b-8a6b-75e5b8fe7967",
                                    "assessment"   => "Clinically stable, euvolemic, does not appear to be in acute CHF at this time",
                                    "plan"         => "Will f/u in one month",
                                    "assigned_by"  => "af406f8e-260d-4d81-9827-ba9301ebd41f",
                                    "created_at"   => "2020-01-13 10:37:45",
                                    "updated_at"   => "2020-01-13 10:37:45",
                                ],
                            ]], $encounterAssessmentService->getAssessments("af406f8e-260d-4d81-9827-ba9301ebd41f"));
    }

    public function testGetAssessmentsLineByLine()
    {
        $repositoryMock = Mockery::mock(EncounterAssessmentRepository::class);

        $repositoryMock->shouldReceive('getAssessments')
                    ->once()
                    ->andReturn([
                        '0' => (object)[
                            "id"           => "3374be52-cf9c-42f1-862e-9ff2459f5d40",
                            "encounter_id" => "8aa02a28-0797-481b-a503-2ef496b493ed",
                            "issue_id"     => "fbd1ee56-c987-4b1b-8a6b-75e5b8fe7967",
                            "assessment"   => "Clinically stable, euvolemic, does not appear to be in acute CHF at this time",
                            "plan"         => "Will f/u in one month",
                            "assigned_by"  => "af406f8e-260d-4d81-9827-ba9301ebd41f",
                            "created_at"   => "2020-01-13 10:37:45",  
                            "updated_at"   => "2020-01-13 10:37:45",
                        ],
                    ]);

        $patientIssueServiceMock = Mockery::mock(PatientIssueService::class);

        $patientIssueServiceMock->shouldReceive('getDiagnosisFromIssue')
                    ->once()
                    ->andReturn("Some description of the diagnosis (diagnosisCode)");

        $encounterAssessmentService = new EncounterAssessmentService($repositoryMock, $patientIssueServiceMock);

        $this->assertEquals([
            '0' => [
                "diagnosis"   => "Some description of the diagnosis (diagnosisCode)",
                "assessments" => "Clinically stable, euvolemic, does not appear to be in acute CHF at this time",
                "plans"       => "Will f/u in one month",
                ],
            ], $encounterAssessmentService->getAssessmentsLineByLine("af406f8e-260d-4d81-9827-ba9301ebd41f"));
    }
}
