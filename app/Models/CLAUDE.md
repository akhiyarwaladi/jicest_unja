# Models Directory

## Overview
Contains Eloquent models representing the database entities for the JICEST conference management system.

## Core Models

### User Model
- **Purpose**: Authentication and user management
- **Features**:
  - Multi-role system (admin, participant, presenter)
  - Email verification
  - Password reset functionality
  - Profile management

### Participant Model
- **Purpose**: Conference participant registration and management
- **Features**:
  - Personal information storage
  - Institution affiliation
  - Contact details
  - Registration type (presenter/participant)
  - Conference category selection

### UploadAbstract Model
- **Purpose**: Abstract submission and management
- **Features**:
  - Abstract file uploads
  - Submission status tracking
  - Review and approval workflow
  - Author information management
  - Category classification

### UploadFulltext Model
- **Purpose**: Full-text paper submission and management
- **Features**:
  - Full paper file uploads
  - Submission tracking
  - Review process management
  - Final paper status
  - Publication readiness

### Payment Model
- **Purpose**: Payment verification and tracking
- **Features**:
  - Receipt upload and storage
  - Payment status verification
  - Amount tracking (IDR/USD)
  - Payment method recording
  - Administrative approval workflow

## Model Relationships
- `User` → `Participant` (One-to-One)
- `Participant` → `UploadAbstract` (One-to-Many)
- `Participant` → `UploadFulltext` (One-to-Many)
- `Participant` → `Payment` (One-to-Many)
- `UploadAbstract` → `Payment` (One-to-One)

## Key Features
- **Eloquent Relationships**: Proper model associations
- **Fillable Protection**: Mass assignment protection
- **Timestamps**: Automatic created/updated tracking
- **Soft Deletes**: Safe data deletion where applicable
- **Accessors/Mutators**: Data formatting and manipulation
- **Validation**: Model-level validation rules

## Database Schema Highlights
- Comprehensive participant information
- File upload tracking with paths
- Multi-currency payment support
- Status tracking for submissions
- Administrative approval workflows

## Conference-Specific Fields
- **Registration Types**: presenter_reguler, presenter_student, participant_reguler, participant_student
- **Categories**: engineering, science_technology, digital_transformation_education, etc.
- **Presentation Types**: oral presentation, poster
- **Payment Status**: pending, valid, rejected
- **Submission Status**: pending, accepted, rejected

## Development Notes
- Uses Laravel Eloquent ORM
- Implements proper relationships and constraints
- Includes data validation and security measures
- Supports file upload management
- Integrates with the conference workflow system