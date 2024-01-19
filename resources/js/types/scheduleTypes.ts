export type Schedule = {
  phase_id: number;
  phase_name: string;
  schedule_id: number | null;
  recruit_id: number | null;
  start_datetime: string | null;
  end_datetime: string | null;
  description: string | null;
};

export type Master = {
  id: number;
  name: string;
};

export type MasterAssessment = {
  id: number;
  name: string;
  color_code: string;
};

export type ResultPhaseUser = {
  phase_id: number;
  phase_name: string;
  phase_users: PhaseUser[] | null;
};

export type PhaseUser = {
  user_id: number;
  user_name: string;
  assessment_id: number;
  assessment_name: string;
  assessment_color: string;
  comment: string | null;
};
